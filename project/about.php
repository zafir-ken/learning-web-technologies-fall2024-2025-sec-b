<?php

session_start();
require_once('usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
{
    $input = file_get_contents('php://input'); //**** 

    // Decode the JSON data
  $data = json_decode($input, true);
  if (isset($data['dob'], $data['city'], $data['bio'], $data['address'], $data['relationship'], $data['country'], $data['edu'])) 
  {
    $dob = htmlspecialchars($data['dob']); // Sanitize input
    $city = htmlspecialchars($data['city']); // Sanitize input
    $bio = htmlspecialchars($data['bio']); // Sanitize input
    $address = htmlspecialchars($data['address']); // Sanitize input
    $relationship = htmlspecialchars($data['relationship']); // Sanitize input
    $country = htmlspecialchars($data['country']); // Sanitize input
    $edu = htmlspecialchars($data['edu']); // Sanitize input
    
    $status=update_about($user_id,$dob,$city,$bio,$address,$relationship,$country,$edu);
    if($status)
    {
        echo json_encode([
            'status' => 'success',
            'message' => 'About updated successful',
        ]);
        exit;
    }
    else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to update about',
        ]);
        exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
</head>
<body>
    <a href="profile.php">Back</a>
    <h5 id=response></h5>
    <form id="about_form">
        <input type="text" id="dob" placeholder="Date Of Birth"><br><br>
        <input type="text" id="city" placeholder= "city"><br><br>
        <input type="text" id="bio" placeholder="Bio"><br><br>
        <input type="text" id="address" placeholder="address"><br><br>
        <input type="text" id="relationship " placeholder="relationship"><br><br>
        <input type="text" id="country" placeholder="country"><br><br>
        <input type="text" id="edu" placeholder="edu"><br><br>
        <button type="submit" name="submit">update</button>
    </form>
    <script src="about_form.js"></script>
</body>
</html>