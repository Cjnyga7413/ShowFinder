<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="edit.css">
    <title>Post Details</title>
</head>
<body>
<?php
include "DbConnect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];


    $get_post_query = "SELECT * FROM Posts WHERE Post_Id = $post_id";
    $result = mysqli_query($conn, $get_post_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post_details = mysqli_fetch_assoc($result);

        echo '<form action="update_post.php" method="post">';
        echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
        echo '<input type="text" name="Title" placeholder="Title" value="' . $post_details['Title'] . '" required>';
        echo '<input type="text" name="Caption" placeholder="Caption" value="' . $post_details['Caption'] . '" required>';
        echo '<input type="text" name="Genre" placeholder="Genre" value="' . $post_details['Genre'] . '" required>';
        echo '<input type="date" name="Date" placeholder="Date" value="' . $post_details['Date'] . '" required>';
        echo '<input type="time" name="Time" placeholder="Time" value="' . $post_details['Time'] . '" required>';
        echo '<input type="text" name="City" placeholder="City" value="' . $post_details['City'] . '" required>';
        echo '<input type="text" name="Address" placeholder="Address" value="' . $post_details['Address'] . '" required>';
        echo '<input type="text" name="Zipcode" placeholder="Zipcode" value="' . $post_details['Zipcode'] . '" required>';
        echo '<input type="submit" value="Update">';
        echo '</form>';
    } else {
        echo 'Post not found.';
    }
} else {
    echo 'Invalid request. Post ID not set.';
}
?>

