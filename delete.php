<?php
include "DbConnect.php";
session_start();



if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $_SESSION['post_id_to_delete'] = $post_id;
} else {
    echo "Invalid request. Post ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="delete.css">
    <title>Delete Post</title>
</head>

<body>
    <div class="form-container">
        <h1>Confirm Deletion</h1>
        <p>Are you sure you want to delete this post?</p>
        <form action="confirm_delete.php" method="post">
            <input type="submit" name="confirm" class="button-styling" value="Yes, delete">
        </form>
        <form action="post_details.php" method="get">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="submit" class="button" value="No, go back">
        </form>
    </div>
</body>

</html>