<?php
session_start();
require_once('usermodel.php');
if(isset($_POST['post']))
{
    $user_id = $_COOKIE['user_id'];
    $status=$_POST['status'];
    post($user_id,$status);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #1c1e21;
            margin: 0;
        }

        .search-bar {
            background-color: white;
            padding: 10px;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-bar input {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }

        .profile-header {
            position: relative;
            text-align: center;
            background-color: #f0f2f5;
            margin-bottom: 20px;
        }

        .cover-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: #ccc;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            top: 150px;
            left: 50%;
            transform: translateX(-50%);
        }

        .profile-header h1 {
            margin-top: 70px;
            font-size: 24px;
        }

        .nav-bar {
            display: flex;
            justify-content: center;
            background-color: white;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .nav-bar a {
            padding: 15px 20px;
            text-decoration: none;
            color: #1877f2;
            font-weight: bold;
        }

        .nav-bar a:hover {
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
        }

        .left-sidebar {
            width: 25%;
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .left-sidebar h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .left-sidebar ul {
            list-style-type: none;
        }

        .left-sidebar ul li {
            margin-bottom: 10px;
        }

        .left-sidebar ul li a {
            text-decoration: none;
            color: #1877f2;
        }

        .main-content {
            width: 75%;
        }

        .status {
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .status textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            outline: none;
            resize: none;
        }

        .status button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #1877f2;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .status button:hover {
            background-color: #145dbf;
        }

        .post {
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .post h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .post p {
            font-size: 14px;
            color: #606770;
        }

        .post .timestamp {
            font-size: 12px;
            color: #90949c;
            margin-top: 5px;
        }
        .logout-button {
            padding: 15px 20px;
            text-decoration: none;
            color: #1877f2;
            font-weight: bold;
         }

        .logout-button:hover {
            background-color: #f0f2f5;
        }

    </style>
</head>
<body>
    <div class="search-bar">
        <input type="text" placeholder="Search for people...">
    </div>

    <div class="profile-header">
        <div class="cover-photo"></div>
        <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-picture">
        <h1>John Doe</h1>
    </div>
        
    <div class="nav-bar">
        <a href="#timeline">Timeline</a>
        <a href="#about">About</a>
        <a href="#friends">Friends</a>
        <a href="#photos">Photos</a>
        <a href="#settings">Settings</a>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <div class="left-sidebar">
            <h2>Friends</h2>
            <ul>
                <li><a href="#">Friend 1</a></li>
                <li><a href="#">Friend 2</a></li>
                <li><a href="#">Friend 3</a></li>
                <li><a href="#">Friend 4</a></li>
               
            </ul>
        </div>

        <div class="main-content">
            <div class="status">
                <form action="" method="POST">
                <textarea rows="3" name="status" placeholder="What's on your mind?"></textarea>
                <button name="post">Post</button>
                </form>
            </div>

            <div class="post">
                <h2>Post Title 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse commodo ligula id volutpat feugiat.</p>
                <div class="timestamp">Posted on January 1, 2025</div>
            </div>
            <div class="post">
                <h2>Post Title 2</h2>
                <p>Quisque ultricies velit in varius vehicula. Curabitur ac libero nec nunc egestas facilisis.</p>
                <div class="timestamp">Posted on December 31, 2024</div>
            </div>

        </div>
    </div>
</body>
</html>
