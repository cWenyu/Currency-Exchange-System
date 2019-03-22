<?php include './include/header.php'; ?>
<main>

    <h2>Financial Currencies List</h2>
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
        <p><a href="?action=list_currencies">List Currencies</a></p>
        <p><a href="?action=add_currency_form">Add Currency</a></p>
        <p><a href="view/userLogIn.php">Quick Check Balance</a></p>
        <p><a href="?action=buy_currency_form">Buy Currency</a></p>
        <p><a href="?action=register_new_form">Register</a></p>
        <p><a href="?action=user_cancellation_form">Account Cancellation</a></p>
    </section>
</section>

</main>
<?php include './include/footer.php'; ?>