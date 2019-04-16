<?php

function new_register_user($registerPassword, $cardNumber, $cardHolder, $balance) {
    global $db;
    $query = 'INSERT INTO users_accounts
                 (register_password,card_number,card_holder,balance)
              VALUES
                 (:registerPassword,:cardNumber,:cardHolder,:balance)';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->bindValue(':balance', $balance);
    $statement->execute();
    $statement->closeCursor();
}

function check_card_number($cardNumber) {
    global $db;
    $query = 'SELECT card_number FROM users_accounts
              WHERE card_number = :cardNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->execute();
    $result = $statement->fetch()[0];
    $statement->closeCursor();
    if ($result == NULL) {
        return true;
        echo 'true';
    } else {
        return false;
        echo 'false';
    }
}

function check_register($registerNumber, $registerPassword) {
    global $db;
    $query = 'SELECT card_holder FROM users_accounts
              WHERE register_number = :registerNumber
              AND register_password = :registerPassword';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->execute();
    $result = $statement->fetch()[0];
    $statement->closeCursor();
    if ($result == NULL) {
        return "null";
    } else {
        return "not null";
    }
}

function delete_register($registerNumber) {
    global $db;
    $query1 = 'DELETE FROM users_currency
              WHERE register_number = :registerNumber';
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':registerNumber', $registerNumber);
    $statement1->execute();
    $statement1->closeCursor();

    $query = 'DELETE FROM users_accounts
              WHERE register_number = :registerNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->execute();
    $statement->closeCursor();
}

function register_number($registerPassword, $cardNumber, $cardHolder, $balance) {
    global $db;
    $query = 'SELECT register_number FROM users_accounts
                 WHERE register_password = :registerPassword
                 AND card_number = :cardNumber
                 AND card_holder = :cardHolder
                 AND balance = :balance';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->bindValue(':balance', $balance);
    $statement->execute();
    $registerNumber = $statement->fetch()[0];
    $statement->closeCursor();
    return $registerNumber;
}

function get_card_holder($registerNumber, $registerPassword) {
    global $db;
    $query = 'SELECT card_holder FROM users_accounts
              WHERE register_number = :registerNumber
              AND register_password = :registerPassword';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->execute();
    $userNameA = $statement->fetch()[0];
    $statement->closeCursor();
    return $userNameA;
}

function get_quantity($registerNumber, $currencyCode) {
    global $db;
    $query = 'SELECT quantity FROM users_currency
              WHERE register_number = :registerNumber
              and currency_code = :currencyCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':currencyCode', $currencyCode);
    $statement->execute();
    $quantity = $statement->fetch()[0];
    $statement->closeCursor();
    return $quantity;
}

function buy_currency($registerNumber, $cardHolder, $currencyCode, $currencyName, $quantity) {
    global $db;
    $quantityOriginal = get_quantity($registerNumber, $currencyCode);
    if ($quantityOriginal == NULL) {
        $query = 'INSERT INTO users_currency
                  (register_number, card_holder, currency_code,currency_name,quantity)
                  VALUES(:registerNumber,:cardHolder,:currencyCode,:currencyName,:quantity)';
        $statement = $db->prepare($query);
        $statement->bindValue(':registerNumber', $registerNumber);
        $statement->bindValue(':cardHolder', $cardHolder);
        $statement->bindValue(':currencyCode', $currencyCode);
        $statement->bindValue(':currencyName', $currencyName);
        $statement->bindValue(':quantity', $quantity);
        $statement->execute();
        $statement->closeCursor();
    } else {
        $quantityCurrent = $quantity + $quantityOriginal;

        $query = 'UPDATE users_currency
              SET quantity = :quantityCurrent
              WHERE register_number = :registerNumber
              AND currency_code = :currencyCode';
        $statement = $db->prepare($query);
        $statement->bindValue(':registerNumber', $registerNumber);
        //$statement->bindValue(':cardHolder', $cardHolder);
        $statement->bindValue(':currencyCode', $currencyCode);
        //$statement->bindValue(':currencyName', $currencyName);
        $statement->bindValue(':quantityCurrent', $quantityCurrent);
        $statement->execute();
        $statement->closeCursor();
    }
}

function buy_currency_change_balance($registerNumber, $cost) {
    global $db;
    $query = 'UPDATE users_accounts
              SET balance = (balance - :cost)
              WHERE register_number = :registerNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':cost', $cost);
    print_r($cost);
    $statement->execute();
    $statement->closeCursor();
}

function user_currency($registerNumber) {
    global $db;
    $query = 'SELECT * FROM users_currency
              WHERE register_number = :registerNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->execute();
    $userProducrs = $statement->fetchAll();
    $statement->closeCursor();
    return $userProducrs;
}

?>