<?php
session_start();
// echo $_SESSION['user_id'];


include('../connect.php');
$id = $_SESSION['user_id'];
// $data="SELECT * from personne where user_id='$id'";
// $data_query=mysqli_query($conn,$data);
// $fectch=mysqli_fetch_array($data_query);
// $data_name=$fectch['user_name'];
// $data_email=$fectch['email'];

if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pwd_hasch = password_hash($password, PASSWORD_DEFAULT);

  $query = "UPDATE personne SET user_name='$name', email='$email', password_user='$pwd_hasch' WHERE user_id='$id'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_affected_rows($conn) > 0) {
    $roleQuery = "SELECT role_name FROM autority_user WHERE user_id='$id'";
    $roleResult = mysqli_query($conn, $roleQuery);

    if ($roleResult) {
      $row = mysqli_fetch_array($roleResult);
      $role = $row['role_name'];

      if ($role == 'admin') {
        header('location:Home.html');
      } else {
        header('location:Home.html');
      }
    }
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
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link href="../css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="../css/jcarousel.css" rel="stylesheet" />
  <link href="../css/flexslider.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet" />

  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #FFF;
      border-radius: 2px;
      box-shadow: 0pc 0px 3px 1px;
      margin-top: 30px;
    }

    .form-container label {
      font-weight: bold;
      margin-bottom: 30px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 0px;
      border: none;
      box-sizing: border-box;
      background-color: white ;
      border-bottom: 1px solid black;
      font-size: 18px;
    }

    .form-container input[type="text"]:hover,
    .form-container input[type="email"]:hover,
    .form-container input[type="password"]:hover{
      background-color: rgb(246, 246, 246);
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
            <a class="navbar-brand" href="Home.html"><img src="../img/logo.png" alt="logo" /></a>
          </div>
          <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
              <li class="active"><a href="home.html">Home</a></li>

              <li><a href="contact.html">Contact</a></li>
              <li><a href="user_info.php">user info</a></li>
              <li><a href="../logout.php"><i class="fa-thin fa-arrow-right-from-bracket">log out</i></a></li>


            </ul>
          </div>

        </div>
      </div>
    </header>


    <div class="form-container" style="margin-bottom:10rem;">
      <form action="" method="POST">
      <label>User Info</label>

        <input type="text" id="name" name="name" required placeholder="Name..."><br><br>

        <input type="email" id="email" name="email" required placeholder = "Email..."><br><br>

        <input type="password" id="password" name="password" required placeholder="password..."><br><br>
        <div class="custom-button" style="display: flex;
      justify-content: flex-end;">
          <button class="btn btn-success" type="submit" name="update" value="Update">Edit</button>
        </div>
      </form>
    </div>


</body>

<?php include("../footer.php"); ?>