<?php 
include "user_session.php";

if (isset($_GET["message"])) {
    $contentEmptyMessage = "You did not write a text.";
}

include "navbar.php";
?>

        <div class="container">
            <h1 class="experience-heading">Tell us about your experience!</h1>
            <p class="error-message" id="empty-message"><?php echo $contentEmptyMessage?></p>
            <form action="guestbook_logic.php" method="post">
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
                <label for="content">Review</label>
                <textarea id="content" name="content"></textarea><br>
                <input type="submit" value="Submit">    
            </form> 
               
        </div>
    </body>
</html>