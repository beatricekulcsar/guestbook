<?php


$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

// Hier werden alle Einträge rausgesucht, deren User ID die selbe ist, wie die des aktellen Benutzers
$sql = "SELECT posts.content, posts.created_at, posts.title, users.name
		FROM posts 
        INNER JOIN users 
            ON posts.users_id=users.id
        WHERE posts.users_id=$userid
        ORDER BY posts.created_at DESC";

$statement = $pdo->query($sql);



$myEntries = $statement->fetchAll(PDO::FETCH_ASSOC);