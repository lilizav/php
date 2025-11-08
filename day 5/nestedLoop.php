<?php 

$arrays = array(
    array(1,2,3),
    array(1,2,3),
    array(1,2,3)
);

$users = array(
    array("Liza","16","Prishtine"),
    array("Rudina","16","Prishtine"),
    array("Unik","13","Prishtine"),
);

/*for($i=1; $i<4; $i++){

    echo "<br> <br> hello". "<br> <br>";
    for($e=1; $e<4; $e++){
        echo "kjo eshte loopa brenda loopes dhe perseritet 3 here";
    }
}*/

for($i=0; $i<3; $i++){

   
    for($e=0; $e<3; $e++){
        echo $users[$i][$e];
}
echo "<br>";
}
?>