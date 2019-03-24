<?php
session_start();
require('model/database.php');
require('model/currency_db.php');
require ('model/user_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_currencies';
    }
}
//list financial products
if ($action == 'list_currencies') {
    $currencies = get_currencies();
    include('view/index_view/currency_list.php');
}
//edit product && update product
else if ($action == 'edit_currency') {
    $currencyCode = filter_input(INPUT_POST, 'currencyCode', FILTER_VALIDATE_INT);
    if ($currencyCode == NULL) {
        $error = "Missing currency code.";
        include('errors/error.php');
    } else if ($currenncyCode == FALSE) {
        $error = "Incorrect currency code.";
        include('errors/error.php');
    } else {
        $currency = get_currencyByCode($currencyCode);
        include('view/currency_edit.php');
    }
} else if ($action == 'update_currency') {
    $currencyCode = filter_input(INPUT_POST, 'currencyCode', FILTER_VALIDATE_INT);
    $currencyName = filter_input(INPUT_POST, 'currencyName');
    $currencyDescription = filter_input(INPUT_POST, 'currencyDescription');
    $currencyPrice = filter_input(INPUT_POST, 'currencyPrice', FILTER_VALIDATE_FLOAT);
    if ($currencyCode == NULL) {
        $error = "Missing currency code.";
        include('errors/error.php');
    } else if ($currencyCode == FALSE) {
        $error = "Incorrect currency code.";
        include('errors/error.php');
    } else if ($currencyName == NULL) {
        $error = "Currency name is null.";
        include('errors/error.php');
    } else if ($currencyDescription == null) {
        $error = "Currency description is null.";
        include('errors/error.php');
    } else if ($currencyPrice == NULL) {
        $error = "Currency price is null.";
        include('errors/error.php');
    } else if ($currencyPrice == FALSE) {
        $error = "Invalid price.";
        include('errors/error.php');
    } else {
        update_currency($currencyCode, $currencyName, $currencyDescription, $currencyPrice);
        header("Location: index.php");
    }
}
//delete product
else if ($action == "delete_currency") {
    $currencyCode = filter_input(INPUT_POST, 'currencyCode', FILTER_VALIDATE_INT);
    if ($currencyCode == NULL) {
        $error = "Missing currency code.";
        include('errors/error.php');
    } else if ($currencyCode == FALSE) {
        $error = "Incorrect currency code.";
        include('errors/error.php');
    } else {
        delete_currency($currencyCode);
        header("Location: index.php");
    }
}
//add product
else if ($action == 'add_currency_form') {
    include('view/index_view/currency_add.php');
} else if ($action == 'add_currency') {
    $currencyName = filter_input(INPUT_POST, 'currencyName');
    $currencyDescription = filter_input(INPUT_POST, 'currencyDescription');
    $currencyPrice = filter_input(INPUT_POST, 'currencyPrice', FILTER_VALIDATE_FLOAT);
    if ($currencyName == NULL) {
        $error = "Currency name is null.";
        include('errors/error.php');
    } else if ($currencyDescription == null) {
        $error = "Currency description is null.";
        include('errors/error.php');
    } else if ($currencyPrice == NULL) {
        $error = "Currency price is null.";
        include('errors/error.php');
    } else if ($currencyPrice == FALSE) {
        $error = "Invalid price.";
        include('errors/error.php');
    } else {
        add_currency($currencyName, $currencyDescription, $currencyPrice);
        header("Location: index.php");
    }
}
//new register 
else if ($action == "register_new_form") {
    include ("view/index_view/user_add.php");
} else if ($action == "register_new") {
    $cardNumber = filter_input(INPUT_POST, 'cardNumber');
    $cardHolder = filter_input(INPUT_POST, 'cardHolder');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
    $balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);
    if ($cardNumber == NULL) {
        $error = "card number is null.";
        include('errors/error.php');
    } else if ($cardHolder == null) {
        $error = "card holder is null";
        include('errors/error.php');
    } else if ($registerPassword == null) {
        $error = "register password is requested";
        include('errors/error.php');
    } else if ($balance == FALSE) {
        $error = "Invalid balance.";
        include('errors/error.php');
    } else {
        $new_pw = sha1($registerPassword);
        new_register_user($new_pw, $cardNumber, $cardHolder, $balance);

        $newRegisterNumber = register_number($new_pw, $cardNumber, $cardHolder, $balance);
        $message = "Your register number is " . $newRegisterNumber;
        
        include('include/messages.php');
    }
}
//user account cancellation
else if ($action == "user_cancellation_form") {
    include ("view/user_cancellation.php");
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
else if ($action == "buy_currency_form") {
    $currencies = get_currencies();
    include ("view/index_view/user_buy_currency.php");
} else if ($action == "buy_currency") {
    $registerNumber = filter_input(INPUT_POST, 'registerNumber');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
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
        $userCurrencies = user_production($registerNumber);
        include 'view/user_production.php';
    }
}
?>
