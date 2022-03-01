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
        include "signup_logic.php";
        
        if ($showFormular) {
        ?>
            <div class="container">
                <h1>Sign up with your email</h1>
                <form action="?signup=1" method="post">
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name"<?php echo $isInvalidName ? 'invalid' : '';?>>
                        <?php if ($isInvalidName): ?>
                            <span class="error-message"><?php echo $nameErrorMessage; ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="email">E-Mail:</label>
                        <input type="email" id="email" name="email" <?php echo $isInvalidEmail ? 'invalid' : '';?>>
                        <?php if ($isInvalidEmail): ?>
                            <span class="error-message"><?php echo $emailErrorMessage; ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" <?php echo $isInvalidPassword ? 'invalid' : '';?>>
                        <?php if ($isInvalidPassword): ?>
                            <span class="error-message"><?php echo $passwordErrorMessage; ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <input type="submit" value="Submit">  

                </form> 
                <p>Already have an account? <a href="/guestbook/index.php">Log in</a></p>
            </div>
        <?php
        }
        ?>
    </body>
</html>