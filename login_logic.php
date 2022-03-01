<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');
 
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        header('Location: all_entries.php');
    } else {
        $errorMessage = "Email or password are invalid<br>";
    }
    
}



 