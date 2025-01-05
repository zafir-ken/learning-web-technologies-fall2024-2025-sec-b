<?php


function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webbook');
    return $conn;
}


function addUser($first_name, $last_name, $user_id, $gender, $email, $password) {
    
    $conn = getConnection();

    $check_sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";

    if (mysqli_num_rows(mysqli_query($conn, $check_sql)) > 0) {
        echo "Error: User ID already exists!";
    } else {
        $sql = "INSERT INTO user_info (first_name, last_name, user_id, gender, email, password) 
                VALUES ('$first_name', '$last_name', '$user_id', '$gender', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            echo "New user added successfully!";
            return true;
        } else {
            return false;
        }
    }

    mysqli_close($conn);
}

function login($user_id, $password){
    $conn = getConnection();
    $sql = "select * from user_info where user_id='{$user_id}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
} 

function post($user_id, $status) {
    $conn = getConnection();

    // Use prepared statements to avoid SQL injection and properly handle values
    $stmt = $conn->prepare("INSERT INTO status (user_id, status) VALUES (?, ?)");
    
    // Bind the parameters ('s' means string for both user_id and status)
    $stmt->bind_param("ss", $user_id, $status);  // "ss" means both are strings

    // Execute the query
    if ($stmt->execute()) {
        echo "Status posted successfully!";
    } else {
        echo "Error posting status: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($conn);
}


?>
