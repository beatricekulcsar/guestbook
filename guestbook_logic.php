<?php
session_start();
//Verbindung zur Datenbank
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

// Benutzer ID des aktuellen Benutzers wird abgefragt
$users_id = intval($_SESSION['userid']);

if ( isset( $_POST['content'] )) {
    $content = $_POST['content'];
    $title   = $_POST['title'];

    // Wenn Inhalt des Contents nicht leer ist, wird der Beitrag zur Datenbank geschickt
    if (trim($content) != '') {
        $statement = $pdo->prepare("INSERT INTO posts (content, users_id, title) VALUES (:content, :users_id, :title)");
        $result = $statement->execute(
            array(
                'content'  => $content,
                'users_id' => $users_id,
                'title'    => $title
            )
        );

        // Nach erfolgreichem Absenden des Eintrages, gelangt user auf Seite mit allen Beiträgen
        return header('Location: all_entries.php');

    }
}    
return header('Location: guestbook.php?message=error');


