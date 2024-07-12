
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Finder</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div class="banner">
        <h1>Show Finder</h1>
        <div class="button-container">
            <?php
            session_start();
            echo '<a href="index.php" class="button">Home</a>';
            if (isset($_SESSION['Id'])) {
                echo '<a href="signout.php" class="button">Sign Out</a>';
                echo '<a href="upload.html" class="button">Upload</a>';
                echo '<a href="Saved_posts.php" class="button">Saved Posts</a>';
                echo '<a href="My_posts.php" class="button">Manage My Posts</a>';
            } else {
                echo '<a href="signin.php" class="button">Sign In</a>';
            }
            echo '<a href="SearchArea.html" class="button">Search by Area</a>';

            ?>
        </div>
    </div>
    <div class="content">
        <img src="componets/HouseShow.jpg" alt="Description of the image" class="left-image">
        <div class="text-content">
            <p>Welcome to Show Finder! This platform is dedicated to help you discover shows in your area or promote your own shows. Get started here and find shows by entering your zipcode, no sign up required <a href="SearchArea.html" class="button">Search Your Area Now</a></p>
            <p>You can Create an account today <a href="signup.php" class="button">Sign Up</a> and start posting shows and accessing our other features today!!!</p>
        </div>
    </div>
    
</body>
</html>

