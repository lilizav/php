<?php 
function callCounter(){
    static $count = 0;
    $count++;
    echo "The value of the variable is $count <br>";
}
callCounter();
callCounter();


?>