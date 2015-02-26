<?php
namespace Xoops\Core;

require_once(dirname(__FILE__).'/../../../init_mini.php');

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-01-18 at 21:49:58.
 */
 
/**
* PHPUnit special settings :
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
class FilterInputTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FilterInput
     */
    protected $object;

    protected $myclass = 'Xoops\Core\FilterInput';

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new FilterInput;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xoops\Core\FilterInput::getInstance
     */
    public function testGetInstance()
    {
        $class = $this->myclass;
        $instance = $class::getInstance();
        $this->assertInstanceOf($class, $instance);

        $instance1 = $class::getInstance();
        $this->assertSame($instance1, $instance);
    }

    /**
     * @covers Xoops\Core\FilterInput::process
     */
    public function testProcess()
    {
        $class = $this->myclass;
        $instance = $class::getInstance();
        $this->assertInstanceOf($class, $instance);

        $input = 'Lorem ipsum </i><script>alert();</script>';
        $expected = 'Lorem ipsum alert();';
        $this->assertEquals($expected, $instance->process($input));

        $input = 'Lorem ipsum';
        $this->assertEquals($input, $instance->process($input));
    }

    /**
     * @covers Xoops\Core\FilterInput::clean
     */
    public function testClean()
    {
        $input = 'Lorem ipsum </i><script>alert();</script>';
        $expected = 'Lorem ipsum alert();';
        $this->assertEquals($expected, FilterInput::clean($input, 'string'));

        $input = 'Lorem ipsum &#x3C;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x3E;&#x61;&#x6C;&#x65;&#x72;&#x74;&#x28;&#x29;&#x3B;&#x3C;&#x2F;&#x73;&#x63;&#x72;&#x69;&#x70;&#x74;&#x3E;';
        $expected = 'Lorem ipsum alert();';
        $this->assertEquals($expected, FilterInput::clean($input, 'string'), FilterInput::clean($input, 'string'));

        $input = 'Lorem ipsum';
        $expected = $input;
        $this->assertEquals($expected, FilterInput::clean($input, 'string'));
    }

    /**
     * @covers Xoops\Core\FilterInput::gather
     */
    public function testGather()
    {
        $specs = array(
            array('op','string'),
            array('ok', 'boolean', false, false),
            array('str', 'word', 'something', true, 5),
        );

        unset($_POST['op']);
        $clean_input = FilterInput::gather('post', $specs, 'op');
        $this->assertFalse($clean_input);

        $_POST['op']='test';
        $clean_input = FilterInput::gather('post', $specs, 'op');
        $this->assertEquals('test', $clean_input['op']);
        $this->assertFalse($clean_input['ok']);
        $this->assertEquals('somet', $clean_input['str']);

        unset($_POST['op']);
        $_POST['ok']='1';
        $_POST['str'] = '  fred! ';
        $clean_input = FilterInput::gather('post', $specs);
        $this->assertEquals('', $clean_input['op']);
        $this->assertTrue($clean_input['ok']);
        $this->assertEquals('fred', $clean_input['str'], $clean_input['str']);
    }
}
