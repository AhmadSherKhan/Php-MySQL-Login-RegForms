<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $verification_code = $_POST['verification_code'];

// connect to your database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'practice';
$conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($conn){
        $sql = "SELECT * FROM users WHERE verification_code = $verification_code";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];

        // redirect
        header('Location: reset_password.php');
        exit();
        }
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Document</title>
</head>
<body>

        <div class="container">
            <div class="form login">
                    <span class="title">Enter verfication Code</span>
                    
                        <form action="enter_verification_code.php" method="post">

                            <div class="input-field">
                                <input type="text" placeholder="Enter your code" name="verification_code" >
                            </div>

                            <div class="input-field button">
                                <input type="submit" value="Reset Password">
                            </div>
        
                        </form>
            </div>
        </div>
    
</body>
</html>