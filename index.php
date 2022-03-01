<?php 
session_start();

if (isset($_SESSION['userid'])) {
    header('Location: guestbook.php');
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="styles.css<?php echo '?version='.time(); ?>">
        <title>Guestbook</title>
    </head>
    <body>
    <?php
    include "login_logic.php";
    ?>
        <div class="container">
            <h1>Sign in with your email</h1>
            <?php if(isset($errorMessage)) : ?>
                <div class="error-message">
                    <p><?php echo $errorMessage; ?></p>
                </div>
            <?php endif; ?>
            <form action="?login=1" method="POST">
                <div>
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>  
                    <input type="submit" value="Sign in">    
            </form> 
            <p>You don't have an account? <a href="/guestbook/signup.php">Sign up</a></p>
        </div>
    </body>
</html>