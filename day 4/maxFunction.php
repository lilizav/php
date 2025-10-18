<?php 

function maximum($x,$y){
    if($x>$y){
        return $x;


}else {
    return $y;
}

}

$a = 20;
$b = 30;

$rezultati = maximum($a,$b);
echo "vlera maksimale eshte $rezultati";


?>