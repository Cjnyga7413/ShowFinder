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

    $user_id = $_SESSION['Id'];

    $search_query = "SELECT * FROM Posts WHERE User_Id = '$user_id'";
    $result = mysqli_query($conn, $search_query);

    echo '<h2>Your Posts <a href="index.php" class="button">Go Back to Home</a></h2>';

    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="button-container">';
                echo '<a href="post_details.php?post_id=' . $row['Post_Id'] . '" class="button"><h3>' . $row['Title'] . '</h3></a>';
                echo '</div>';
                
                
            }
        } else {
            echo '<p>You have nothing posted anything. <a href="upload.html" class="button">Upload now</a></p>';
            echo '<a href="index.php" class="button">Go Back to Home</a>';
        }
    } else {
        echo '<p>Query error: ' . mysqli_error($conn) . '</p>';
    }
    mysqli_close($conn);
    ?>
</body>
</html>
