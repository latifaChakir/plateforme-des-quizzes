<?php
include('../../connect.php');
$id=$_GET['id'];
$query="DELETE FROM personne WHERE personne.user_id='$id'";
$result=mysqli_query($conn,$query);
if($result){
    echo 'delte';
}else{
    echo'not delete';
}
