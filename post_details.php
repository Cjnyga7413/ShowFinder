<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="post_details.css">
    <title>Post Details</title>
</head>
<body>

<?php
include "DbConnect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['post_id'])) {
    $target_post_id = $_GET['post_id'];

    $get_post_query = "SELECT Posts.*, Users.Username FROM Posts
                   JOIN Users ON Posts.User_Id = Users.Id
                   WHERE Posts.Post_Id = $target_post_id";
    $result = mysqli_query($conn, $get_post_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post_details = mysqli_fetch_assoc($result);

        echo '<div class="post-details">';
        echo '<h1 class="post-title">' . $post_details['Title'] . ' - Posted by ' . $post_details['Username'] . '</h1>';
        echo '<p class="post-caption">' . $post_details['Caption'] . '</p>';
        echo '<p class="post-details-info">Genre: ' . $post_details['Genre'] . '</p>';
        echo '<p class="post-details-info">Date: ' . $post_details['Date'] . '</p>';
        echo '<p class="post-details-info">Time: ' . $post_details['Time'] . '</p>';
        echo '<p class="post-details-info">City: ' . $post_details['City'] . '</p>';
        echo '<p class="post-details-info">Address: ' . $post_details['Address'] . '</p>';
        echo '<p class="post-details-info">Zipcode: ' . $post_details['Zipcode'] . '</p>';
        echo '</div>';

        if (isset($_SESSION['Id'])) {
            $user_id = $_SESSION['Id'];
            
            if ($user_id == $post_details['User_Id']) {
                echo '<a href="edit.php?post_id=' . $post_details['Post_Id'] . '" class="button">Edit Post</a>';
                echo '<a href="delete.php?post_id=' . $post_details['Post_Id'] . '" class="button">Delete Post</a>';
            } else {
                $check_saved_query = "SELECT * FROM SavedPosts WHERE Post_Id = {$post_details['Post_Id']} AND User_Id = $user_id";
                $check_saved_result = mysqli_query($conn, $check_saved_query);
                echo '<a href="Saved_posts.php" class=button>Go Back to Saved Posts</a>';
                if ($check_saved_result && mysqli_num_rows($check_saved_result) > 0) {
                    echo '<a href="unsave.php?post_id=' . $post_details['Post_Id'] . '" class="button">Unsave Post</a>';
                } else {
                    echo '<a href="save.php?post_id=' . $post_details['Post_Id'] . '" class="button">Save Post</a>';
                }
            }
        }
        echo '<a href="search.php?zipcode=' . $post_details['Zipcode'] . '" class="button">Search For Other Posts in this Area</a>';
        echo '<a href="index.php" class=button>Home</a>';
    } else {
        echo 'Post not found.';
    }

    mysqli_close($conn);
} 

?>
</body>
</html>


