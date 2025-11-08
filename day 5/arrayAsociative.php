<?php 

$grade = array(
    "Matematike"=>"5",
    "Art"=>"4",
    "Histori"=>"3"
);

$grade ['Matematike']= "10";
/*echo "nota per matematike eshte: " . $grade['Math']; */

foreach($grade as $emriLandes => $nota){
    echo "per lenden : ". $emriLandes . " nota eshte : ". $nota ."<br>";
}
?>