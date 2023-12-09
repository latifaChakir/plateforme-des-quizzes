<?php
session_start();
// echo $_SESSION['user_id'];


include('../../connect.php');
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
        header('location:../Home.html');
      } else {
        header('location:../../student/Home.html');
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
    
  <?php include("nav.php") ?>


    <div class="form-container" style="margin-bottom:10rem;">
      <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <div class="custom-button" style="display: flex;
      justify-content: flex-end;">
          <button class="btn btn-success" type="submit" name="update" value="Update">Edit</button>
        </div>
      </form>
    </div>


</body>

<?php include("../../footer.php"); ?>