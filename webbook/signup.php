<?php
session_start();
require_once('usermodel.php');
if(isset($_POST['login']))
{
  header("location: login.php");
}
if(isset($_POST['submit']))
{
    $first_name=trim($_POST['first_name']);
    $last_name=trim($_POST['last_name']);
    $gender = trim($_POST['gender']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);

    if ($password !== $confirm_password) 
    {
        echo "Passwords do not match.";
    }
    else 
    {
      $user_id=rand(1,100000000);
      while(!isunique($user_id))
      {
         $user_id=rand(1,100000000);
      }

      if(!isunique_email($email))
      {
          echo "This Email is already registered";
      }
      else
      {
        $status = addUser($first_name, $last_name, $user_id, $gender, $email, $password);
        if($status)
        {
            header('location: login.php');
        }
        else 
        {
           header('location: signup.php');
        }
      }

       
    }

    

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebBook Sign Up</title>
  <style>
   
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #996515;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    
    .container {
      text-align: center;
      width: 100%;
      max-width: 400px;
    }
    header {
      background-color: #708090;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      color: white;
      margin: 0;
    }

    .login-btn {
      background-color: #d3a42e;
      border: none;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-btn:hover {
      background-color: #bf901d;
    }

    
    .signup-box {
      background-color: blue;
      color: white;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
    }

    .signup-box h2 {
      margin-bottom: 20px;
      font-size: 20px;
    }

    
    form {
      display: flex;
      flex-direction: column;
    }

    form input, form select {
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: none;
      font-size: 16px;
    }

    form select {
      background-color: white;
      color: black;
    }

    .signup-btn {
      background: linear-gradient(to right, cyan, green);
      border: none;
      padding: 10px;
      font-size: 16px;
      color: white;
      cursor: pointer;
      border-radius: 5px;
    }

    .signup-btn:hover {
      background: linear-gradient(to right, green, cyan);
    }
    a {
    text-decoration: none;
  }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1><a href="login.php">WebBook</a></h1>
      <form action="" method="POST">
       <button name="login" class="login-btn">Login</button>
      </form>
      
    </header>
    <div class="signup-box">
      <h2>Sign up To WebBook</h2>
      <form action="" method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password"  name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        
        <button type="submit" name="submit" class="signup-btn">Sign Up</button>
      </form>
    </div>
  </div>
</body>
</html>
