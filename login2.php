<?php

include ("loging_utente.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="post" action="login2.php">
            <h1>Login</h1>
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="password" placeholder="Password" name="password">
            <button type="submit" name="login">Accedi</button>
        </form>
        <div style='text-align:center'>
        <a  href="registrazione.php">COME BACK</a>
        </div>
    </body>
</html>