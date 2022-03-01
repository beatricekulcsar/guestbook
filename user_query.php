<?php
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

// Hier wird der Name des aktuellen Benutzer aus der Datenbank abgefragt um ihn in die Navigationsleiste einzufügen
$sql = "SELECT name 
		FROM users
        WHERE id=$userid";
        

$statement = $pdo->query($sql);

$user = $statement->fetchAll(PDO::FETCH_ASSOC)[0];