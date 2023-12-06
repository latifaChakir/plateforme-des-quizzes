<?php
include('../../connect.php');
$id=$_GET['id'];
$query="DELETE FROM personne WHERE personne.user_id='$id'";
$result=mysqli_query($conn,$query);
if($result){
    header('location:index.php');
}else{
    echo'not delete';
}
