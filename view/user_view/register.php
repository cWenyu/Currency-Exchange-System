<?php
//register.php

/**
 * Start the session.
 */
session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require 'lib/password.php';

/**
 * Include our MySQL connection.
 */
require 'login_connect.php';


//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if (isset($_POST['register'])) {

    //Retrieve the field values from our registration form.
    $cardNumber = !empty($_POST['cardNumber']) ? trim($_POST['cardNumber']) : null;
    $cardHolder = !empty($_POST['cardHolder']) ? trim($_POST['cardHolder']) : null;
    $registerPassword = !empty($_POST['registerPassword']) ? trim($_POST['registerPassword']) : null;
    $deposit = !empty($_POST['balance']) ? trim($_POST['balance']) : null;

    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    //Now, we need to check if the supplied username already exists.
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(card_number) AS num FROM users_accounts WHERE card_number = :cardNumber";
    $stmt = $pdo->prepare($sql);

    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':cardNumber', $cardNumber);

    //Execute.
    $stmt->execute();

    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if ($row['num'] > 0) {
        die('That bank card already registered!');
    }

    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($registerPassword, PASSWORD_BCRYPT, array("cost" => 12));

    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO users_accounts (register_password, card_number,card_holder,balance)
            VALUES (:registerPassword,:cardNumber, :cardHolder,:balance)";
    $stmt = $pdo->prepare($sql);

    //Bind our variables.
    $stmt->bindValue(':cardNumber', $cardNumber);
    $stmt->bindValue('cardHolder', $cardHolder);
    $stmt->bindValue(':registerPassword', $passwordHash);
    $stmt->bindValue(':balance', $deposit);

    //Execute the statement and insert the new account.
    $result = $stmt->execute();

    //If the signup process is successful.
    if ($result) {
        //What you do here is up to you!
        echo 'Thank you for registering with our system.';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="cardNumber">Card Number</label>
            <input type="text" placeholder="Card Number" id="cardNumber" name="cardNumber" pattern="^[0-9]{16}$" required autofocus><br>

            <label for="cardHolder">Card holder:</label>
            <input type="text" placeholder="Card Holder" id = "cardHolder" name="cardHolder" pattern="^[A-Za-z]*$" required autofocus>
            <br>

            <label for="registerPassword">Register Password:</label>
            <input type="password" id="registerPassword" name="registerPassword" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required oninvalid="must be 8/16 with nubers or letters">
            <br>

            <label for="balance">Deposit:</label>
            <input type="input" id="balance" name="balance" pattern="^([0-9]*)+(.[0-9]{1,2})?$" placeholder="Deposit" required autofocus>
            <br>
            <input type="submit" name="register" value="Register"></button>
        </form>
    </body>
</html>