<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

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