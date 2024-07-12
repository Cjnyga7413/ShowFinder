
<?php

include "DbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


if (!isset($_SESSION['Id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['confirm'])) {
    if ($_POST['confirm'] === "Yes, delete") {
        $post_id = $_SESSION['post_id_to_delete'];
        $delete_post_query = "DELETE FROM Posts WHERE Post_Id = $post_id";
        $delete_result = mysqli_query($conn, $delete_post_query);

        if ($delete_result) {
            header("Location: sucess.php?type=delete");
            exit;
        } else {
            echo "Error deleting the post.";
        }
    } else {
        header("Location: post_details.php?post_id=" . $post_id);
        exit;
    }
} else {
    echo "Invalid request.";
}
?>