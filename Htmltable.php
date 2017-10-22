<?php
 class Htmltable extends page 
{
  //converting the dynamically accessed csv file to html table.
  public static function Get()
 {
    $row = 1;
    if (($file = fopen($_GET['filename'], "r" )) !== false ) 
  {
     echo '<table border="1">';
     while (($csvdata = fgetcsv($file, 1000, ",")) !== FALSE) 
  {
     $count = count($csvdata);
    if ($row == 1) 
  {
      echo '<thead><tr>';
   }
    else
  {
      echo '<tr>';
   }
   
     for ($initial=0; $initial < $count; $initial++)
  {
     if(empty($csvdata[$initial])) 
  {
     $filedata = "&nbsp;";
   }
     else
  {
     $filedata = $csvdata[$initial];
   }
     if ($row == 1) 
  {
     echo '<th>'.$filedata.'</th>';
   }
     else
  {
     echo '<td>'.$filedata.'</td>';
   }
   }
     if ($row == 1) 
  {
     echo '</tr></thead><tbody>';
   }
       else
  {
       echo '</tr>';
   }
       $row++;
   }
       echo '</tbody></table>';
       fclose($file);
   }
 }
}
?>