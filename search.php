<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Shows Near You</title>
    <style>
h2 {
    font-family: 'CustomFont3', sans-serif;
    font-size: 35px;
}
p{
    font-family: 'CustomFont3', sans-serif;
    font-size: 20px;
}
        </style>
</head>
<body>
    <?php
    include "DbConnect.php";
    session_start();
    if (isset($_GET['zipcode'])) {
        $target_zipcode = $_GET['zipcode'];
        $search_query = "SELECT * FROM Posts WHERE Zipcode = '$target_zipcode'";
        $result = mysqli_query($conn, $search_query);

       
        echo '<h2>Shows Near You <a href="SearchArea.html" class="button">Search Another Area</a> <a href="index.php" class="button">Go Back Home</a> </h2>';

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="button-container">';
                    echo '<a href="post_details.php?post_id=' . $row['Post_Id'] . '" class="button"><h3>' . $row['Title'] . '</h3></a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No results found, try searching another area </p>';
            }
        } else {
            echo '<p>Query error: ' . mysqli_error($conn) . '</p>';
        }

        mysqli_close($conn);
    } else {
        echo 'Invalid request. Zipcode not set.';
    }
    ?>
</body>
</html>





