<?php
include("auth.php");
authenticate();


// session_start(); // start the session

if(isset($_POST['logout'])) { // check if the logout button has been clicked
    session_destroy(); // destroy all session data
    header('Location: index.php'); // redirect the user to the login page
    exit(); // stop the script from executing further
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3 style="color:green;">Login Successfully!</h3> 
<h1>Welcome to Home Page</h1>
<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>

</body>
</html>