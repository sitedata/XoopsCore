<?php
require_once(dirname(__FILE__).'/../../../init.php');

/**
* PHPUnit special settings :
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
class BloggerApiTest extends MY_UnitTestCase
{
    protected $myclass = 'BloggerApi';
    
    public function test___construct()
	{
		$x = new $this->myclass();
		$this->assertInstanceof($this->myclass, $x);
		$this->assertInstanceof('XoopsXmlRpcApi', $x);
	}

    function test_BloggerApi(&$params, &$response, &$module)
    {
    }

    function test_newPost()
    {
    }

    function test_editPost()
    {
    }

    function test_deletePost()
    {
    }

    function test_getPost()
    {
    }

    function test_getRecentPosts()
    {
    }

    function test_getUsersBlogs()
    {
    }

    function test_getUserInfo()
    {
    }

    function test_getTemplate()
    {
    }

    function test_setTemplate()
    {
    }
}
