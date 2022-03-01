<?php
session_start();
//Verbindung zur Datenbank
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');


$users_id = intval($_SESSION['userid']);

if ( isset( $_POST['content'] )) {
    $content = $_POST['content'];
    $title   = $_POST['title'];

    if (trim($content) != '') {
    
        $statement = $pdo->prepare("INSERT INTO posts (content, users_id, title) VALUES (:content, :users_id, :title)");
        $result = $statement->execute(
            array(
                'content'  => $content,
                'users_id' => $users_id,
                'title'    => $title
            )
        );
        return header('Location: guestbook.php');

    }
}    

return header('Location: guestbook.php?message=error');


