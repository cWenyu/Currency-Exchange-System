<?php

function get_products() {
    global $db;
    $query = 'SELECT * FROM financial_products
              ORDER BY product_code';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_productByCode($productCode) {
    global $db;
    $query = 'SELECT * FROM financial_products
              where product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($productCode) {
    global $db;
    $query = 'DELETE FROM financial_products
              WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($productName, $productDescription, $productPrice) {
    global $db;
    $query = 'INSERT INTO financial_products
                 (product_name, product_description, product_price)
              VALUES
                 (:productName, :productDescription, :productPrice)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':productDescription', $productDescription);
    $statement->bindValue(':productPrice', $productPrice);
    $statement->execute();
    $statement->closeCursor();
}

function update_product($productCode, $productName, $productDescription, $productPrice) {
    global $db;
    $query = 'UPDATE financial_products
              SET product_name = :productName,
              product_description = :productDescription,
              product_price = :productPrice
              WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':productDescription', $productDescription);
    $statement->bindValue(':productPrice', $productPrice);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function get_product_name($productCode) {
    global $db;
    $query = 'SELECT product_name FROM financial_products
              WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $productName = $statement->fetch()[0];
    $statement->closeCursor();
    return $productName;
}

function get_product_price($productCode) {
    global $db;
    $query = 'SELECT product_price FROM financial_products
              WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $productPrice = $statement->fetch()[0];
    $statement->closeCursor();
    return $productPrice;
}

?>