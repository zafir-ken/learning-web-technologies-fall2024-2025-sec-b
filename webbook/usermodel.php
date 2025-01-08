<?php


function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webbook');
    return $conn;
}

function isunique($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT * FROM user_info WHERE user_id = '$user_id'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) 
    {
        return false;
    }
    else 
    {
        return true;
    }
    mysqli_close($conn); 
}
function isunique_email($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT * FROM user_info WHERE email = '$email'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) 
    {
        return false;
    }
    else 
    {
        return true;
    }
    mysqli_close($conn); 
}

function addUser($first_name, $last_name, $user_id, $gender, $email, $password) {
    
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $check_sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";

   
        $sql = "INSERT INTO user_info (first_name, last_name, user_id, gender, email, password) 
                VALUES ('$first_name', '$last_name', '$user_id', '$gender', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);
}

function login($email, $password){
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select * from user_info where email='{$email}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
    mysqli_close($conn);
} 


function get_first_name($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT first_name FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['first_name'];
    } else {
        return null;
    }

    $conn->close();

}

function get_last_name($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT last_name FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['last_name'];
    } else {
        return null;
    }

    $conn->close();
}

function get_user_id($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT user_id FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['user_id'];
    } else {
        return null;
    }

    $conn->close();
}

function post_status($user_id,$status)
 {
    
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

   
        $sql = "INSERT INTO statuses (user_id, status, time) 
                VALUES ('$user_id', '$status', NOW())";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);
}

function show_status($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, status,time FROM statuses WHERE user_id = $user_id";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['id'], $row['status'],$row['time']);
    }
    if(count($arr)>0)
    {
        usort($arr, function ($a, $b) { return $a[0] - $b[0];  });
        return $arr;
    }
    

}






?>
