<?php 

$dogs = array("Husky","Malinois","German SHephard");

echo $dogs[1];

$users = array(
    array("Liza","16","Prishtine"),
    array("Rudina","16","Prishtine"),
    array("Unik","13","Prishtine"),
);

echo "Emri: " .$users[0][0]."   Mosha: ".$users[0][1]."   Vendbanimi: ".$users[0][2]. "<br>";
echo "Emri: " .$users[1][0]."   Mosha: ".$users[1][1]."   Vendbanimi: ".$users[1][2]. "<br>";
echo "Emri: " .$users[2][0]."   Mosha: ".$users[2][1]."   Vendbanimi: ".$users[2][2] . "<br>"; 

?>