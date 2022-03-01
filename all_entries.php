<?php

include 'user_session.php';
include 'Parsedown.php';
include 'query.php';
include "navbar.php";

?>

<!-- Erstellen der Seite mit allen Einträgen -->
    <h1 id="guestbook-header">Guestbook</h1>
    <?php 
    if ($entries) {
	$Parsedown = new Parsedown();
    foreach ($entries as $entry) {
        $title = $entry['title'];
        // Markdown wird dem Textfeld hinzugefügt
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
