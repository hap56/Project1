<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

class Forautoloading
{
	//autoload all the php files using Autoload.
 public static function Autoload($class) 
   {
 	 include $class . '.php';
   }
}
 spl_autoload_register(array('Forautoloading','Autoload'));
 //creating object for class
$csvtotable = new Csv_fetcher();

class Csv_fetcher
{
	//calling get and post method toupload information on a browser.
	public function __construct()
	{
		$pageRequest = 'Fileupload';
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

abstract class page 
{
	//creating protected variable $a and calling it with $this variable.
	protected $a;
	public function __construct()
	{
		$this->a .= '<html>';
		$this->a .='<body>';
	}
	public function __destruct()
	{
		$this->a .= '</body></html>';
		Stringfunction::printThis($this->a);
	}
}
?>