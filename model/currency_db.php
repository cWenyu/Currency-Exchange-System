<?php

function get_currencies() {
    global $db;
    $query = 'SELECT * FROM currency_products
              ORDER BY currency_code';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $currencies = $stmt->fetchAll();
    $stmt->closeCursor();
    return $currencies;
}

function get_currencyByCode($currencyCode) {
    global $db;
    $query = 'SELECT * FROM currency_products
              where currency_code = :currencyCode';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyCode', $currencyCode);
    $stmt->execute();
    $currency = $stmt->fetch();
    $stmt->closeCursor();
    return $currency;
}

function delete_currency($currencyCode) {
    global $db;
    $query = 'DELETE FROM currency_products
              WHERE currency_code = :currencyCode';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyCode', $currencyCode);
    $stmt->execute();
    $stmt->closeCursor();
}

function add_currency($currencyName, $currencyDescription, $currencyPrice) {
    global $db;
    $query = 'INSERT INTO currency_products
                 (currency_name, currency_description, currency_price)
              VALUES
                 (:currencyName, :currencyDescription, :currencyPrice)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyName', $currencyName);
    $stmt->bindValue(':currencyDescription', $currencyDescription);
    $stmt->bindValue(':currencyPrice', $currencyPrice);
    $stmt->execute();
    $stmt->closeCursor();
}

function update_currency($currencyCode, $currencyName, $currencyDescription, $currencyPrice) {
    global $db;
    $query = 'UPDATE currency_products
              SET currency_name = :currencyName,
              currency_description = :currencyDescription,
              currency_price = :currencyPrice
              WHERE currency_code = :currencyCode';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyName', $currencyName);
    $stmt->bindValue(':currencyDescription', $currencyDescription);
    $stmt->bindValue(':currencyPrice', $currencyPrice);
    $stmt->bindValue(':currencyCode', $currencyCode);
    $stmt->execute();
    $stmt->closeCursor();
}

function get_currency_name($currencyCode) {
    global $db;
    $query = 'SELECT currency_name FROM currency_products
              WHERE currency_code = :currencyCode';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyCode', $currencyCode);
    $stmt->execute();
    $currencyName = $stmt->fetch()[0];
    $stmt->closeCursor();
    return $currencyName;
}

function get_currency_price($currencyCode) {
    global $db;
    $query = 'SELECT currency_price FROM currency_products
              WHERE currency_code = :currencyCode';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':currencyCode', $currencyCode);
    $stmt->execute();
    $currencyPrice = $stmt->fetch()[0];
    $stmt->closeCursor();
    return $currencyPrice;
}

?>