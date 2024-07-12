<?php
include "DbConnect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $post_id = $_POST['post_id'];   
    $title = $_POST['Title'];
    $caption = $_POST['Caption'];
    $genre = $_POST['Genre'];
    $date = $_POST['Date'];
    $time = $_POST['Time'];
    $city = $_POST['City'];
    $address = $_POST['Address'];
    $zipcode = $_POST['Zipcode'];

    
    $title = mysqli_real_escape_string($conn, $title);
    $caption = mysqli_real_escape_string($conn, $caption);
    $genre = mysqli_real_escape_string($conn, $genre);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $city = mysqli_real_escape_string($conn, $city);
    $address = mysqli_real_escape_string($conn, $address);
    $zipcode = mysqli_real_escape_string($conn, $zipcode);

    $update_post_query = "UPDATE Posts SET Title='$title', Caption='$caption', Genre='$genre', Date='$date', Time='$time', City='$city', Address='$address', Zipcode='$zipcode' WHERE Post_Id=$post_id";

    $result = mysqli_query($conn, $update_post_query);

    if ($result) {
        header("Location: post_details.php?post_id=$post_id");
        exit();
    } else {
        echo "Error updating post: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo 'Invalid request. Post ID not set.';
}
?>


