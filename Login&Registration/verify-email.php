<?php

if($_GET['key'] && $_GET['token']){
    $conn = mysqli_connect('localhost','root','','practice');

    if(!$conn){
        die("Could not connect to database" . mysql_error());
    }

    $email = $_GET['key'];
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE email='$email' AND token='$token'";
    $result= mysqli_query($conn,$sql);
    $d = date('Y-m-d H:i:s'); //date and time in which email verified
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if($row['verified_at'] == NULL && $row['status'] == NULL){
            mysqli_query($conn,"UPDATE users SET status = 'verified', verified_at = '$d'  WHERE email = '$email'");
            $msg = "Congratulations your email has been verified";
        }else{
            $msg = "The email has already regietered";
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Account Activation by Email Verification using PHP</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
        <div class="container mt-3">
            <div class="card">

                <div class="card-header text-center">
                    User Account Activation by Email Verification using PHP
                </div>

                <div class="card-body">
                    <p><?php echo $msg; ?></p><br>
                    <a href="index.php" class="btn btn-default">Login</a>
                </div>

            </div>
        </div>
</body>
</html>