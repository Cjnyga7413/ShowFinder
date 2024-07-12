<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="sucess.css">
    <title>Success</title>

</head>
<body>
    <div class="success-box">
        <h1>Your Request was a success</h1>
        <?php
        if (isset($_GET['type']) && $_GET['type'] === 'save') {
            echo '<p>Post saved successfully!</p>';
        } elseif (isset($_GET['type']) && $_GET['type'] === 'unsave') {
            echo '<p>Post unsaved successfully!</p>';
        } elseif (isset($_GET['type']) && $_GET['type'] === 'delete') {
            echo '<p>Your post was deleted successfully!</p>';
        } elseif (isset($_GET['type']) && $_GET['type'] === 'upload') {
            echo '<p>Your post was successfully uploaded!</p>';
        }
        ?>
        <div class="success-container">
            <form action="index.php" method="post">
                <button type="submit" class="button" name="go_home">Home</button>
            </form>

            <form action="saved_posts.php" method="post">
                <button type="submit" class="button" name="go_saved_posts">Saved Posts</button>
            </form>

            <form action="my_posts.php" method="post">
                <button type="submit" class="button" name="go_my_posts">My Posts</button>
            </form>
        </div>
    </div>
</body>
</html>