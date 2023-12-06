<?php
include('../../connect.php');

$id=$_GET['id'];
$query="SELECT * FROM personne inner join autority_user on autority_user.user_id=personne.user_id WHERE personne.user_id='$id'";

$result=mysqli_query($conn,$query);


$row = mysqli_fetch_assoc($result);
   $user_name = $row['user_name'];
    $email = $row['email'];
    // $password_user = $row['password_user'];
    $role=$row['role_name'];
if(isset($_POST['update'])){

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    // $password_user = $_POST['password_user'];
    $role = $_POST['role'];

    $update="UPDATE personne set user_name='$user_name',email='$email' where personne.user_id='$id' ";

    mysqli_query($conn,$update);
    
    if ($result) {
        // Get the last inserted user_id
        $user_id = mysqli_insert_id($conn);
        
        // Insert data into the autority_user table
        $rol_update = "UPDATE autority_user  set role_name='$role'where autority_user.user_id='$id'  ";
        $rol_result = mysqli_query($conn, $rol_update); 

        header('location:index.php');
    }else{
        echo 'eroor';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .input-field {
            display: block;
            margin-top: 13px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .input-field:focus {
            border-color: #6e81e2;
            outline: none;
        }
        
        .label {
            font-weight: bold;
        }
        
        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6e81e2;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .submit-btn:hover {
            background-color: #5266c9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>update user</h2>
        <form action="" method="POST" id="form">
            <label for="user_name" class="label">User Name</label>
            <input type="text" name="user_name" id="user_name" class="input-field" value="<?php echo $user_name?>">
            
            <label for="email" class="label">Email</label>
            <input type="text" name="email" id="email" class="input-field"value="<?php echo $email?>">
            
            
            
            <label for="role" class="label">Role</label>
            <select name="role" id="role" class="input-field"value="<?php echo $role?>">
              
             
               
            
                    
                    <option value="student"> student </option>
                    <option value="admin"> admin </option>
                   
                
            </select>
            
            <button type="submit" name="update" class="submit-btn">submit</button>
        </form>
    </div>
</body>
</html>
