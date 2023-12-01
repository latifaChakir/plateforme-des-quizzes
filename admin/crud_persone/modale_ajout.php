<?php
include('../../connect.php');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password_user = $_POST['password_user'];
    $role = $_POST['role'];
 
    // Insert data into the personne table
    $query = "INSERT INTO personne (user_name, email, password_user) VALUES ('$user_name', '$email', '$password_user')";
   
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if the query executed successfully
    if ($result) {
        // Get the last inserted user_id
        $user_id = mysqli_insert_id($conn);
        
        // Insert data into the autority_user table
        $rol_insert = "INSERT INTO autority_user (role_name, user_id) VALUES ('$role', $user_id)";
        $rol_result = mysqli_query($conn, $rol_insert);
        
        // Check if the query executed successfully
        if ($rol_result) {
            echo 'add success';
        } else {
            echo 'invalid';
        }
    } else {
        echo 'invalid';
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
        <h2>Add User</h2>
        <form action="" method="POST" id="form">
            <label for="user_name" class="label">User Name</label>
            <input type="text" name="user_name" id="user_name" class="input-field">
            
            <label for="email" class="label">Email</label>
            <input type="text" name="email" id="email" class="input-field">
            
            <label for="password_user" class="label">Password</label>
            <input type="password" name="password_user" id="password_user" class="input-field">
            
            <label for="role" class="label">Role</label>
            <select name="role" id="role" class="input-field">
              
             
               
            
                    
                    <option value="student"> student </option>
                    <option value="admin"> admin </option>
                   
                
            </select>
            
            <button type="submit" name="submit" class="submit-btn">submit</button>
        </form>
    </div>
</body>
</html>