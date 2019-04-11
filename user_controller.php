<?php

session_start();
require('model/database.php');
require('model/currency_db.php');
require ('model/user_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_user_currencies';
    }
}
//list financial products
if ($action == 'list_user_currencies') {
    $currencies = get_currencies();
    include('./view/user_view/user_currency_list.php');
}

//user account cancellation
else if ($action == "user_cancellation_form") {
    include ("view/user_view/user_cancellation.php");
} else if ($action == "account_cancellation") {
    $registerNumber = filter_input(INPUT_POST, 'registerNumber');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
    if ($registerNumber == NULL) {
        $error = "Register Number can not be null.";
        include('errors/error.php');
    } else if ($registerPassword == NULL) {
        $error = "Please enter your register password again.";
        include('errors/error.php');
    } else {
        delete_register($registerNumber, $registerPassword);
        $message = "Your account has been cancelled ";
        include('include/messages.php');
    }
}
//buy product
else if ($action == "user_buy_currency_form") {
    $currencies = get_currencies();
    include ("view/user_view/user_buy_currency.php");
} else if ($action == "buy_currency") {
    $registerNumber = $_SESSION['user_session'];
    $registerPassword = $_SESSION['user_password'];
    $cardHolder = get_card_holder($registerNumber,$registerPassword);
    $currencyCode = filter_input(INPUT_POST, 'currencyCode');
    $currencyName = get_currency_name($currencyCode);
    $quantity = filter_input(INPUT_POST, 'quantity');
    $singlePrice = get_currency_price($currencyCode);
    $cost = $singlePrice * $quantity;
    if ($quantity == NULL) {
        $error = "Quantity shold be 1 at least.";
        include('errors/error.php');
    } else {
        buy_currency($registerNumber, $cardHolder, $currencyCode, $currencyName, $quantity);
        buy_currency_change_balance($registerNumber, $cost);
        $userCurrencies = user_currency($registerNumber);
        header("Location: view/user_view/user_currency_list.php");
    }
}
?>
