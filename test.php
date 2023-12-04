<?php
session_start();
$var=1;

$_SESSION['nom']=$var;

echo $_SESSION['nom'];
$var=$var+1;
echo'=========';
print_r($_SESSION['nom']);

?>