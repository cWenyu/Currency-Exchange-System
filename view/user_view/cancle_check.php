<?php

session_start();
require_once '../../model/database.php';
if (isset($_POST['btn-cancle'])) {
    $register_number = trim($_POST['registerNumber']);
    $register_password = trim($_POST['registerPassword']);

    $password = sha1($register_password);

    try {

        if (check_register($register_number, $register_password) === true) {
            delete_register($register_number);
            echo "ok";
            $message = "Your account has been cancelled ";
//            include('include/messages.php');
        } else if (check_empty_register_number($register_number) === TRUE) {
            echo "Please check your register number";
            //include('include/messages.php');
        } else {
            echo "Please check your password";
            //include('include/messages.php');
        }

//        $stmt = $db->prepare("SELECT * FROM users_accounts WHERE register_number=:register_number");
//        $stmt->execute(array(":register_number" => $register_number));
//        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//        $count = $stmt->rowCount();
//
//        if ($row['register_password'] == $password) {
//            echo "ok"; // log in
//            $_SESSION['user_session'] = $row['register_number'];
//            $_SESSION['user_password'] = $row['register_password'];
//        } else {
//            echo "register number or password does not exist."; // wrong details 
//        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>