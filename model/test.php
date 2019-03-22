<?php


require('database.php');
require('product_db.php');
require ('user_db.php');


$result = get_product_price(2);

print_r($result);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

