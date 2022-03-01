<?php
session_start();
if(!isset($_SESSION['userid'])) {
    die('Please <a href="index.php">log in</a> first.');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
?>