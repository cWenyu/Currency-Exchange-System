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


?>
