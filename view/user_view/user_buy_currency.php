<?php include './include/header.php'; ?>
<main>
    <h2>Buy Currency</h2>
    <form action="user_controller.php" method="post" id="buy_currency_form">
        <input type="hidden" name="action" value="buy_currency">

        <label>Currencies:</label>
        <select name="currencyCode">
            <?php foreach ($currencies as $currency) : ?>
                <option value="<?php echo $currency['currency_code']; ?>">
                    <?php echo $currency['currency_name'];?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Quantity: </label>
        <input type="input" name="quantity" pattern="[0-9]*$"/>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Submit">
        <br>
    </form>
    <p><a href="view/user_view/user_currency_list.php">List Currencies</a></p>
</main>
<?php include './include/footer.php'; ?>