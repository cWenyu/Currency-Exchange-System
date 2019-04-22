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
//list 
if ($action == 'list_currencies') {
    $currencies = get_currencies();
    include('view/admin_view/adcurrency_list.php');
}
//edit product && update product
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
        include('view/admin_view/currency_edit.php');
    }
} else if ($action == 'update_currency') {
    $currencyCode = filter_input(INPUT_POST, 'currencyCode', FILTER_VALIDATE_INT);
    $currencyName = filter_input(INPUT_POST, 'currencyName');
    $currencyDescription = filter_input(INPUT_POST, 'currencyDescription');
    $currencyPrice = filter_input(INPUT_POST, 'currencyPrice', FILTER_VALIDATE_FLOAT);
    update_currency($currencyCode, $currencyName, $currencyDescription, $currencyPrice);
    $currencies = get_currencies();
    include 'view/admin_view/adcurrency_list.php';
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
        $currencies = get_currencies();
        include 'view/admin_view/adcurrency_list.php';
    }
}
//add product
else if ($action == 'add_currency_form') {
    include('view/admin_view/currency_add.php');
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
         $currencies = get_currencies();
        include 'view/admin_view/adcurrency_list.php';
    }
}
?>