<?php
session_start();

if (isset($_SESSION['Id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
    <div class="module-box">
        
        <div class="signup-form">
            <h2>Create Account</h2>
            <?php if (!empty($_SESSION['error_message'])): ?>
                <p class="error-message"><?php echo $_SESSION['error_message']; ?></p>
                 <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <form action="sign_up_handle.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="Username">Username (must contain a capital letter):</label>
                <input type="text" id="Username" name="Username" pattern="^(?=.*[A-Z]).+$" required>
                
                <label for="Password">Password:</label>
                <input type="password" id="Password" name="Password" required>
                <div id="message">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <script>
                    var myInput = document.getElementById("Password");
                    var letter = document.getElementById("letter");
                    var capital = document.getElementById("capital");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    myInput.onfocus = function() {
                        document.getElementById("message").style.display = "block";
                    }
                    myInput.onblur = function() {
                        document.getElementById("message").style.display = "none";
                    }

                
                    myInput.onkeyup = function() {
                        var lowerCaseLetters = /[a-z]/g;
                        if(myInput.value.match(lowerCaseLetters)) {  
                            letter.classList.remove("invalid");
                            letter.classList.add("valid");
                        } else {
                            letter.classList.remove("valid");
                            letter.classList.add("invalid");
                        }
                        
                        
                        var upperCaseLetters = /[A-Z]/g;
                        if(myInput.value.match(upperCaseLetters)) {  
                            capital.classList.remove("invalid");
                            capital.classList.add("valid");
                        } else {
                            capital.classList.remove("valid");
                            capital.classList.add("invalid");
                        }
                        
                        var numbers = /[0-9]/g;
                        if(myInput.value.match(numbers)) {  
                            number.classList.remove("invalid");
                            number.classList.add("valid");
                        } else {
                            number.classList.remove("valid");
                            number.classList.add("invalid");
                        }
                    
                        if(myInput.value.length >= 8) {
                            length.classList.remove("invalid");
                            length.classList.add("valid");
                        } else {
                            length.classList.remove("valid");
                            length.classList.add("invalid");
                        }
                    }
                </script>

                <button type="submit" class="button">Create Account</button>
            </form>
            <p>Already have an account? <a href="signin.php" class ="button">Sign In</a></p>
        </div>
    </div>
</body>
</html>


