<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$error_message = '';
include "DbConnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['Username']);
    $password = validate($_POST['Password']);

    
    $checkUserQuery = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $checkUserQuery);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($password == $row['Password']) {
                $_SESSION['Id'] = $row['Id'];
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Invalid login. Please check your username and password.";
                $_SESSION['error_message'] = $error_message;
                header("Location: signin.php");
                exit;
            }
        } else {
            $error_message = "Invalid login. Please check your username and password.";
            $_SESSION['error_message'] = $error_message;
            header("Location: signin.php");
            exit;
        }
    } else {
        echo "Query failed: " . mysqli_error($conn);
    }
    $_SESSION['error_message'] = $error_message;

}
?>











