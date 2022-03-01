<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

$sql = "SELECT name 
		FROM users
        WHERE id=$userid";
        

$statement = $pdo->query($sql);

$user = $statement->fetchAll(PDO::FETCH_ASSOC)[0];