<?php

class Forautoloading
{
 public static function Autoload($class) 
   {
 	 include $class . '.php';
   }
}
 spl_autoload_register(array('Forautoloading','Autoload'));
$csvtotable = new Csv_fetcher();

class Csv_fetcher
{
	public function __construct()
	{
		$pageRequest = 'fileupload';
		if(isset($_REQUEST['page']))
		{
			$pageRequest = $_REQUEST['page'];
		}
		$page = new $pageRequest;
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$page->Get();
		}
		else
		{
			$page->Post();
		}
	}
}
