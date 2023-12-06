<?php
session_start();
// echo $_SESSION['id'];


include('../../connect.php');


if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $pwd_hasch=password_hash($password,PASSWORD_DEFAULT);
  
   $id=$_SESSION['id'];
    $query="UPDATE personne set user_name='$name' ,email='$email',password_user='$pwd_hasch' where user_id='$id' ";
    $result=mysqli_query($conn,$query);

    
    if($result){
      header('location:index.php');
    }else{
      echo 'error';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" />
<link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="../../css/jcarousel.css" rel="stylesheet" />
<link href="../../css/flexslider.css" rel="stylesheet" />
<link href="../../css/style.css" rel="stylesheet" />

<style>

  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
  }

  .form-container label {
    font-weight: bold;
  }

  .form-container input[type="text"],
  .form-container input[type="email"],
  .form-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  .form-container input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .form-container input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>

</head>
<body>
<div id="wrapper">
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="../../img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home.html">Home</a></li> 
						<li><a href="cours.html">Courses</a></li>
                        <li><a href="result.html">Result</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="">profeil</a></li>

                    </ul>
                </div>
			
            </div>
        </div>
	</header>


<div class="form-container">
  <form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" name="update" value="Update">
  </form>
</div>

    
</body>