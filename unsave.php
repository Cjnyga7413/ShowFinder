<?php
include "DbConnect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['post_id']) && isset($_SESSION['Id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['Id'];

    $check_saved_query = "SELECT * FROM SavedPosts WHERE Post_Id = $post_id AND User_Id = $user_id";
    $check_saved_result = mysqli_query($conn, $check_saved_query);

    if ($check_saved_result && mysqli_num_rows($check_saved_result) > 0) {
        $unsave_post_query = "DELETE FROM SavedPosts WHERE Post_Id = $post_id AND User_Id = $user_id";
        $unsave_result = mysqli_query($conn, $unsave_post_query);

        if ($unsave_result) {
            $_SESSION['post_unsaved'] = true;
            header("Location: sucess.php? type=unsave");
            exit;
        } else {
            echo 'Error unsaving post';
        }
    } else {
        echo("Post is not saved");
    }
} else {
    echo 'Invalid request. Post ID or user ID not set.';
}

mysqli_close($conn);
?>