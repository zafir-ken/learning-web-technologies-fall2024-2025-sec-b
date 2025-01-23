<?php
session_start();
require_once('usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
$cur_pass = cur_password($user_id);
//var_dump($cur_pass);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input'); // Get raw POST data
    $data = json_decode($input, true); // Decode JSON data

    if (isset($data['current_password']) && isset($data['new_password'])) {
        $current_password = htmlspecialchars($data['current_password']);
        if ($cur_pass !== $current_password) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Current password doesn\'t match',
            ]);
            exit;
        } else {
            $new_password = htmlspecialchars($data['new_password']);
            if (change_password($user_id, $new_password)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Password change successful',
                ]);
                exit;
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to change password',
                ]);
                exit;
            }
        }
    }
    if(isset($data['first_name']))
    {
        $fname = htmlspecialchars($data['first_name']);
        $status=change_first_name($user_id, $fname);
        if($status)
        {
            echo json_encode([
                'status' => 'success',
                'message' => 'first name change successful',
            ]);
            exit;
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to change first name',
            ]);
            exit;
        }
    }
    if(isset($data['last_name']))
    {
        $lname = htmlspecialchars($data['last_name']);
        $status=change_last_name($user_id, $lname);
        if($status)
        {
            echo json_encode([
                'status' => 'success',
                'message' => 'first name change successful',
            ]);
            exit;
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to change first name',
            ]);
            exit;
        }
    }
}
/*
if (isset($_POST['change_first_name'])) {
    $first_name = $_POST['first_name'];
    change_first_name($user_id, $first_name);
    echo "success";

}

if (isset($_POST['change_last_name'])) {
    $last_name = $_POST['last_name'];
    change_last_name($user_id, $last_name);
    echo "success";
}
*/
if (isset($_POST['change_email'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    change_email($user_id, $email);
    $email = $_SESSION['email'];
    setcookie("email", $email, time() + (3600), "/");
    echo "success";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #6200ea;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4500b5;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .section {
            margin-bottom: 30px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #6200ea;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <a href="profile.php" class="back-btn">Back</a>
    <div class="container">
        <h1>Settings</h1>

        <div class="section">
            <h2>Change Password</h2>
            <h5 id="response2"></h5>
            <form  id="change_pass_form">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" placeholder="Enter your current password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" placeholder="Enter a new password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"  placeholder="Confirm your new password" required>
                </div>

                <button type="submit" name="change_password">Change Password</button>
            </form>
        </div>

        <div class="section">
            <h2>Update Profile Information</h2>
            <h5 id="response3"></h5>
            <form id="change_first_name_form">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter your first name">
                    <button type="submit" name="change_first_name">Change First Name</button>
            </form>
        </div>
        <h5 id="response4"></h5>
        <form id="change_last_name_form">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter your last name">
                <button type="submit" name="change_last_name">Change Last Name</button>
        </form>
    </div>
    <form >
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <button type="submit" name="change_email">Change email</button>
    </form>
    </div>

    </div>
    </div>
    <script src="change_password_form.js"></script>
    <script src="change_first_name_form.js"></script>
    <script src="change_last_name_form.js"></script>
</body>

</html>