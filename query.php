<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

$sql = 'SELECT posts.content, posts.created_at, posts.title, users.name 
		FROM posts
        INNER JOIN users ON posts.users_id=users.id
        ORDER BY posts.created_at DESC';

$statement = $pdo->query($sql);

$entries = $statement->fetchAll(PDO::FETCH_ASSOC);