<?php
session_start();
include_once '../model/database.php';
$stmt = $db->prepare("SELECT card_holder,balance FROM users_accounts WHERE register_number=:register_number");
$stmt->execute(array(":register_number" => $_SESSION['user_session']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include '../include/header.php'; ?>
<main>
    <h2>User Balance</h2> 
    <hr/>
    <h3>Hi <?php echo $row['card_holder']; ?> Welcome to the balance page.</h3>
    <p>Your Balance is <?php echo $row['balance'] ?> €</p>
    <hr/>
    <section>
        <table>
            <tr>
                <th>Currency Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($currencies as $currency) : ?>
                <tr>
                    <td><?php echo $currency['currency_name']; ?></td>    
                    <td><?php echo $currency['currency_description']; ?></td>
                    <td><?php echo $currency['currency_price']; ?></td>   
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="edit_currency">
                            <input type="hidden" name="currencyCode" value="<?php echo $currency['currency_code']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_currency">
                            <input type="hidden" name="currencyCode" value="<?php echo $currency['currency_code']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="../user_controller.php?action=list_user_currencies">List Currencies</a></p>
        <p><a href="?action=user_buy_currency_form">Buy Currency</a></p>
        <p><a href="?action=user_cancellation_form">Account Cancellation</a></p>
    </section>
    <a href="logout.php"><i aria-hidden="true"></i> &nbsp;Sign Out</a>
</main>
<?php include '../include/footer.php'; ?>
<!DOCTYPE html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/ee309940e2.js"></script>
