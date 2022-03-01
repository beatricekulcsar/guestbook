<?php
$creationDate = strtotime($created_at);
?>

<article class="container">
    <h2 class="author-name"><?php echo $title; ?></h2>
    <p><?php echo $content; ?></p>
    <div class="entry-infos">
        <p><?php echo $authorName ?></p>
        <p class="creation-date"><?php echo date("F j, Y, g:i a", $creationDate); ?></p>
    </div>
</article>
