<?php

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
//list currencies
if ($action == 'list_currencies') {
    $currencies = get_currencies();
    include('view/index_view/currency_list.php');
}
//edit currencies && update currencies
else if ($action == 'edit_currency') {
    $currencyCode = filter_input(INPUT_POST, 'currencyCode', FILTER_VALIDATE_INT);
    if ($currencyCode == NULL) {
        $error = "Missing currency code.";
        include('errors/error.php');
    } else if ($currencyCode == FALSE) {
        $error = "Incorrect currency code.";
        include('errors/error.php');
    } else {
        $currency = get_currencyByCode($currencyCode);
        include('view/index_view/currency_edit.php');
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
//delete currencies
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
//add currencies
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
    include ("view/user_view/user_add.php");
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
    include ("./view/user_view/user_cancellation.php");
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
        if (delete_register($registerNumber, $registerPassword) == 0) {
            $message = "Your account has been cancelled ";
        }
//        else{
//             $message = "Cancel account failed, please contact with bank stuff";
//        }

        include('include/messages.php');
    }
}
//login
else if($action == "login"){
    include ("./view/index_view/login_1.php");
}
?>
