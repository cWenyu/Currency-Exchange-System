<?php


require('database.php');
require('currency_db.php');
require ('user_db.php');


$result = check_register_password(2019032912,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

print_r($result);

//if($result === true){
//    echo 'null';
//}else{
//    echo 'not null';
//}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

