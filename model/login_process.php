<?php

session_start();
require_once 'database.php';
if (isset($_POST['btn-login'])) {
    $register_number = trim($_POST['register_number']);
    $register_password = trim($_POST['password']);

    $password = sha1($register_password);

    try {

        $stmt = $db->prepare("SELECT * FROM users_accounts WHERE register_number=:register_number");
        $stmt->execute(array(":register_number" => $register_number));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if ($row['register_password'] == $password) {
            echo "ok"; // log in
            $_SESSION['user_session'] = $row['register_number'];
            $_SESSION['user_password'] = $row['register_password'];
        } else {
            echo "register number or password does not exist."; // wrong details 
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>