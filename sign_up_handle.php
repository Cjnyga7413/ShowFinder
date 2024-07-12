<?php

include "DbConnect.php";
session_start();


if(isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["email"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['Username']);
    $password = validate($_POST['Password']);
    $email = validate($_POST['email']);

    $checkUserQuery = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $checkUserQuery);

    if (mysqli_num_rows($result) > 0) {
        $error_message = 'Username is already in use';
        $_SESSION['error_message'] = $error_message;
        header("Location: signup.php");
        exit;
    }
    else{

    

    $insertUserQuery = "INSERT INTO users (Username, Password, Email) VALUES ('$username', '$password', '$email')";
   

     if (mysqli_query($conn, $insertUserQuery)) {
        session_start();
        $_SESSION['Id'] = mysqli_insert_id($conn);
        header('Location: index.php');
        exit;

    }
   }
}
?>









