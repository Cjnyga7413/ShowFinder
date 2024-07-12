<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Your Posts</title>
    <style>
        h2 {
            font-family: 'CustomFont3', sans-serif;
            font-size: 35px;
        }
        p {
            font-family: 'CustomFont3', sans-serif;
            font-size: 20px;
        }
    </style>
</head>
<body>

<?php

include "DbConnect.php";
session_start();

if (!isset($_SESSION['Id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['Id'];
$get_saved_posts_query = "SELECT * FROM Posts WHERE Post_Id IN (SELECT Post_Id FROM SavedPosts WHERE User_Id = $user_id)";
$saved_posts_result = mysqli_query($conn, $get_saved_posts_query);
echo '<h2>Saved Posts <a href="index.php" class="button">Go Back to Home</a></h2>';
if ($saved_posts_result && mysqli_num_rows($saved_posts_result) > 0) {
    echo '<div class="search-results">'; 

    while ($row = mysqli_fetch_assoc($saved_posts_result)) {
        echo '<div class="button-container">';
                echo '<a href="post_details.php?post_id=' . $row['Post_Id'] . '" class="button"><h3>' . $row['Title'] . '</h3></a>';
                echo '</div>';
    }

} else {
    echo '<p>No saved posts found.</p>';
}

mysqli_close($conn);
?>
</body>
</html>
