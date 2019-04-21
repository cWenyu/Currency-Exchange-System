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
if ($action == 'list_user_currencies' || $action == "user_account") {
    $currencies = get_currencies();
    include('view/user_view/user_currency_list.php');
}

//user account cancellation
else if ($action == "user_cancellation_form") {
    include ("view/user_view/user_cancellation.php");
} else if ($action == "account_cancellation") {
    $registerNumber = filter_input(INPUT_POST, 'registerNumber');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
    if (check_register($registerNumber, $registerPassword) === true) {
        delete_register($registerNumber);
        $message = "Your account has been cancelled ";
        include('include/messages.php');
    } else if (check_empty_register_number($registerNumber) === TRUE) {
        $message = "Please check your register number";
        include('include/messages.php');
    } else {
        $message = "Please check your password";
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
    $cardHolder = get_card_holder($registerNumber, $registerPassword);
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
        include 'view/user_view/user_currency_list.php';
    }
}

//deposit
else if ($action == "user_cash_deposit_form") {
    include ("view/user_view/user_deposit.php");
} else if ($action == "cash_deposit") {
    $registerNumber = $_SESSION['user_session'];
    $deposit = filter_input(INPUT_POST, 'deposit');
    cash_deposit($registerNumber, $deposit);
    include 'view/user_view/user_currency_list.php';
} else if ($action == "user_login") {
    include ("view/user_view/userLogIn.php");
}
?>
