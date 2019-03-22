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
//list financial products
if ($action == 'list_currencies') {
    $products = get_products();
    include('view/currency_list.php');
}
//edit product && update product
else if ($action == 'edit_product') {
    $productCode = filter_input(INPUT_POST, 'productCode', FILTER_VALIDATE_INT);
    if ($productCode == NULL) {
        $error = "Missing product code.";
        include('errors/error.php');
    } else if ($productCode == FALSE) {
        $error = "Incorrect product code.";
        include('errors/error.php');
    } else {
        $product = get_productByCode($productCode);
        include('view/product_edit.php');
    }
} else if ($action == 'update_product') {
    $productCode = filter_input(INPUT_POST, 'productCode', FILTER_VALIDATE_INT);
    $productName = filter_input(INPUT_POST, 'productName');
    $productDescription = filter_input(INPUT_POST, 'productDescription');
    $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_VALIDATE_FLOAT);
    if ($productCode == NULL) {
        $error = "Missing product code.";
        include('errors/error.php');
    } else if ($productCode == FALSE) {
        $error = "Incorrect product code.";
        include('errors/error.php');
    } else if ($productName == NULL) {
        $error = "Product name is null.";
        include('errors/error.php');
    } else if ($productDescription == null) {
        $error = "Product description is null.";
        include('errors/error.php');
    } else if ($productPrice == NULL) {
        $error = "Product price is null.";
        include('errors/error.php');
    } else if ($productPrice == FALSE) {
        $error = "Invalid price.";
        include('errors/error.php');
    } else {
        update_product($productCode, $productName, $productDescription, $productPrice);
        header("Location: index.php");
    }
}
//delete product
else if ($action == "delete_product") {
    $productCode = filter_input(INPUT_POST, 'productCode', FILTER_VALIDATE_INT);
    if ($productCode == NULL) {
        $error = "Missing product code.";
        include('errors/error.php');
    } else if ($productCode == FALSE) {
        $error = "Incorrect product code.";
        include('errors/error.php');
    } else {
        delete_product($productCode);
        header("Location: index.php");
    }
}
//add product
else if ($action == 'add_product_form') {
    include('view/product_add.php');
} else if ($action == 'add_product') {
    $productName = filter_input(INPUT_POST, 'productName');
    $productDescription = filter_input(INPUT_POST, 'productDescription');
    $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_VALIDATE_FLOAT);
    if ($productName == NULL) {
        $error = "Product name is null.";
        include('errors/error.php');
    } else if ($productDescription == null) {
        $error = "Product description is null.";
        include('errors/error.php');
    } else if ($productPrice == NULL) {
        $error = "Product price is null.";
        include('errors/error.php');
    } else if ($productPrice == FALSE) {
        $error = "Invalid price.";
        include('errors/error.php');
    } else {
        add_product($productName, $productDescription, $productPrice);
        header("Location: index.php");
    }
}
//new register 
else if ($action == "register_new_form") {
    include ("view/user_add.php");
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
        new_register_user($registerPassword, $cardNumber, $cardHolder, $balance);

        $newRegisterNumber = register_number($registerPassword, $cardNumber, $cardHolder, $balance);
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
else if ($action == "buy_product_form") {
    $products = get_products();
    include ("view/user_buy_product.php");
} else if ($action == "buy_product") {
    $registerNumber = filter_input(INPUT_POST, 'registerNumber');
    $registerPassword = filter_input(INPUT_POST, 'registerPassword');
    $cardHolder = get_card_holder($registerNumber, $registerPassword);
    $productCode = filter_input(INPUT_POST, 'productCode');
    $productName = get_product_name($productCode);
    $quantity = filter_input(INPUT_POST, 'quantity');
    $singlePrice = get_product_price($productCode);
    $cost = $singlePrice * $quantity;
    if ($quantity == NULL) {
        $error = "Quantity shold be 1 at least.";
        include('errors/error.php');
    } else {
        buy_product($registerNumber, $cardHolder, $productCode, $productName, $quantity);
        buy_product_change_balance($registerNumber, $cost);
        $userProducts = user_production($registerNumber);
        include 'view/user_production.php';
    }
}
?>
