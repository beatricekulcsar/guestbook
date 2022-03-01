<?php 
include "user_query.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css<?php echo '?version='.time(); ?>">
    <title>Guestbook</title>
</head>
<body>
    <header>
        <ul class="navbar">
            <li class="navbar-item"><a href="/guestbook/guestbook.php">Write an entry</a></li>
            <li class="navbar-item"><a href="/guestbook/all_entries.php">Guestbook</a></li>
            <li class="navbar-item"><a href="/guestbook/user_entries.php">Your Entries</a></li>
            <li style="float:right" class="navbar-item"><a href="/guestbook/sign_out.php">Log Out</a></li>
            <li style="float:right" class="name-item"><?php echo "Hello $user[name]";?></li>
        </ul>
    </header>