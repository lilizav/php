<?php 
//opens the file tasks.txt in a reading mode
$file =fopen("tasks.txt","w+");


// $header= fgetcsv($file,0,"\t");


$tasku = "read ab book";

fwrite($file,$tasku);

fclose($file);
?>