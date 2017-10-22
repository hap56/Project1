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
