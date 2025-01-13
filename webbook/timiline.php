<?php
session_start();
require_once('usermodel.php');
$email = $_COOKIE['email'];
$user_id=get_user_id($email);
$first=get_first_name($email);
$last=get_last_name($email);
$name=$first ." ".$last;
$arr=show_status($user_id);

if(isset($_POST['post']))
{
    
    $status=$_POST['status'];
    post_status($user_id,$status);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();

}
if(isset($_POST['delete']))
{
    
}
$arr1=show_friends($user_id);
$arr1=unique_arr($arr1);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBook</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #d3d8e3;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgb(5, 44, 241);
            padding: 10px 20px;
        }
        .header h1 {
            color: white;
            font-size: 24px;
            margin-right: 20px;
        }
        .header .search-box {
            flex-grow: 1;
        }
        .header input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
        }
        .header .profile-icon {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            margin-left: 10px;
        }
        .container {
            display: flex;
            padding: 20px;
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
            flex-grow: 1;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
        }
        .main-content textarea {
            width: 100%;
            height: 100px;
            font-size: 14px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }
        .main-content .post-button {
            display: block;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
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
        .profile-icon {
        width: 100px;
        height: 100px; 
        background-color: #f0f0f0; 
        display: flex; 
        justify-content: center;
        align-items: center; 
        border-radius: 50%; 
        text-align: center; 
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease; 
    }

    .profile-icon:hover {
        background-color: #d9d9d9; 
    }

    .profile-icon h4 {
        margin: 0; 
        font-size: 18px; 
        color: #333; 
    }

    a {
        text-decoration: none;
    }
    </style>
</head>
<body>
    <div class="header">
        <h1>WebBook</h1>
        <div class="search-box">
            <input type="text" placeholder="Search for People">
        </div>
        <a href="profile.php">
    <div class="profile-icon">
        <h4>
            <?php
            $s=substr($first,0,1);
            $ss=substr($last,0,1);
            echo"$s $ss";
            ?>
        </h4>
    </div>
    </a>
    </div>
    
    <div class="container">
        <div class="left-sidebar">
        <h2>Friends</h2>
            <ul>
            <?php
                if(!empty($arr1))
                {
                    
                    for($i=0;$i<count($arr1);$i++)
                    {
                        if($user_id!=$arr1[$i][0])
                        {
                            echo '<li>';
                            echo '<div class="friend-info">' . $arr1[$i][1] . ' ' . $arr1[$i][2] . '</div>';
                            echo '<form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="friend_user_id" value="' . $arr1[$i][0] . '">
                                    <button type="submit" name="friend_request" class="friend-request-btn">View Profile</button>
                                </form>';
                            echo '</li>';
                        }
                            
                        }
                    
                    
                }
                ?>
            </ul>
        </div>

        <div class="main-content">
            <form action="" method="POST">
                <textarea rows="3" name="status" placeholder="What's on your mind?"></textarea>
                <button name="post" class="post-button">Post</button>
            </form>

            <?php
            if (!empty($arr) && count($arr) > 0) {
                $n = count($arr);
                for ($i = $n - 1; $i >= 0; $i--) {
                    if (isset($arr[$i][1], $arr[$i][2])) {
                        echo '<div class="post">';
                        echo "<h2>$name</h2>";
                        echo "<p>" . $arr[$i][1] . "</p>";
                        echo '<div class="timestamp">Posted on ' . $arr[$i][2] . '</div>';
                        echo '
                            <form action="" method="POST" style="display: inline;">
                                <button name="edit">Edit</button>
                            </form>
                            <form action="" method="POST" style="display: inline;">
                                <button name="delete">Delete</button>
                            </form>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
