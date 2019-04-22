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

//new register 
else if ($action == "register_new_form") {
    include ("view/user_view/user_add.php");
} else if ($action == "register_new") {
    $cardNumber = filter_input(INPUT_POST, 'cardNumber');
    $cardHolder = filter_input(INPUT_POST, 'cardHolder');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
    $balance = filter_input(INPUT_POST, 'balance', FILTER_VALIDATE_FLOAT);
    if (check_card_number($cardNumber) === false) {
        $message = "Card number has aleardy exist, please check again.";
        include('include/messages.php');
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

//user login
else if($action == "user_login"){
    include('view/user_view/userLogin.php');
}

else if($action == "admin_login"){
    include('view/admin_view/admin_login.php');
}

?>
