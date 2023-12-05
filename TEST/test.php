<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>test</h1>
   <form action="" method="POST">
     <input type="submit" name="red" value="red">
     <input type="submit" name="green" value="green">
    
   </form>
   <?php
   session_start();
   if(isset($_POST['red'])){
    $_SESSION['color']='red';
   }
   if(isset($_POST['green'])){
    $_SESSION['color']='green';
   }
   echo $_SESSION['color'];
   ?>

</body>
</html>