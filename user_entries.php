<?php

include 'user_session.php';
include 'Parsedown.php';
include 'my_posts_query.php';
include "navbar.php";
?>

    <h1 id="guestbook-header">Your Entries</h1>
    <?php 
    if ($myEntries) {
	$Parsedown = new Parsedown();
    foreach ($myEntries as $entry) {
        $title = $entry['title'];
        $content = $Parsedown->text($entry['content']);
        $authorId = $entry['users_id'];
        $created_at = $entry['created_at'];
        $authorName = $entry['name'];


        
        include 'single-entry.php';
	}
}
 ?>
</body>
</html>