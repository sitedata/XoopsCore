<?php
require_once(dirname(__FILE__).'/../../init_mini.php');

/**
* PHPUnit special settings :
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/
class XoopsMySQLDatabaseSafeTest extends MY_UnitTestCase
{
    protected $myclass = 'XoopsMySQLDatabaseSafe';
    
    public function SetUp()
	{
    }
	
    public function test_100()
	{	
		$instance = new $this->myclass();
    }
	
	public function test_200()
	{
		// query
	}

}
