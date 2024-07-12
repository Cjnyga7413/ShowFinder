<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="signin.css">
    <title>Sign In</title>
</head>
<body>
    <div class="sign-in-container">
        <h2>Sign In</h2>
        <?php if (!empty($_SESSION['error_message'])): ?>
            <p class="error-message"><?php echo $_SESSION['error_message']; ?></p>
            <?php unset($_SESSION['error_message']); // Clear the error message after displaying ?>
        <?php endif; ?>

        <form action="sign_in_handle.php" method="post">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username" required><br>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" required><br>

            <input type="submit" class="button" value="Sign In">
        </form>

        <p>Don't have an account? <a href="signup.php" class="button">Create Account</a> or <a href="index.php" class="button">Go back home</a> </p>
    </div>
</body>
</html>
