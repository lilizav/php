<?php 
function fully_divisable($n){
if(($n % 2) == 0){
    echo "$n is fully divisible by 2";
}
else{
    echo "$n is not fully divisible by 2";
}
}
print_r(fully_divisable(4)."<br>");
print_r(fully_divisable(45)."<br>");
print_r(fully_divisable(12)."<br>");
print_r(fully_divisable(433)."<br>");

?>