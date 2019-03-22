<?php
session_start();
require_once '../model/database.php';
if (isset($_POST['btn-login'])) {
    $register_number = trim($_POST['register_number']);
    $register_password = trim($_POST['password']);

    $password = md5($register_password);

    try {

        $stmt = $db->prepare("SELECT * FROM users_accounts WHERE register_number=:register_number");
        $stmt->execute(array(":register_number" => $register_number));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if ($row['register_password'] == $register_password) {

            echo "ok"; // log in
            $_SESSION['user_session'] = $row['register_number'];
        } else {

            echo "register number or password does not exist."; // wrong details 
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>