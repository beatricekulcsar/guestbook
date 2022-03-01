<?php
session_start();
//Verbindung zur Datenbank
$pdo = new PDO('mysql:host=localhost;dbname=guestbook', 'root', 'root');

$showFormular = true;

if(isset($_GET['signup'])) {
    $error = false;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //Prüft ob eingegebene E-Mail valid ist und gibt Fehlermeldung aus
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isInvalidEmail = true;
        $emailErrorMessage = 'Please enter a valid email';
        $error = true;
    }    
    
    //Prüft ob Passwort-Feld leer ist und gibt Fehlermeldung aus
    if(strlen($password) == 0) {
        $isInvalidPassword = true;
        $passwordErrorMessage = 'Please enter a password';
        $error = true;
    }

    //Prüft ob Namensfeld leer ist gibt Fehlermeldung aus
    if(strlen($name) == 0) {
        $isInvalidName = true;
        $nameErrorMessage = 'Please enter your name';
        $error = true;
    }
    
    //Überprüfung ob E-Mail bereits vergeben ist und gibt Fehlermeldung aus
    if(!$error) { 
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();
        
        if($user !== false) {
            $isInvalidEmail = true;
            $emailErrorMessage = 'This email has already been used';
            $error = true;
        }    
    }
    
    //Wenn keine Fehler auftreten, kann der Nutzer registriert werden
    if(!$error) {   
        // Password wird mit der password_hash method "verschlüsselt" 
        $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
            
        $statement = $pdo->prepare("INSERT INTO users (email, password, name) VALUES (:email, :password, :name)");
        $result = $statement->execute(array('email' => $email, 'password' => $passwort_hash, 'name' => $name));
        
        if($result) {       
            echo 'Your sign up was successful. <a href="index.php" class="login-link">Log in</a>';
            $showFormular = false;
        } else {
            echo 'An error appeared while signing up<br>';
        }
    } 
}