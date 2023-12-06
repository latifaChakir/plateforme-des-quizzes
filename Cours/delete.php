<?php 
include("../connect.php");
if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql="DELETE from cours where cours_id='$id' ";
    $result=mysqli_query($conn,$sql);

    if($result){
        header("Location:cours.php");
    }
        else{
            die("Something went wrong");
        }
}
else{
    echo "cours does not exist";
}
?>