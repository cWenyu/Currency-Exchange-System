<?php include './include/header.php'; ?>
<main>
    <h2>Buy Currency</h2>
    <form action="index.php" method="post" id="buy_currency_form">
        <input type="hidden" name="action" value="buy_currency">

        <!--input-->
        <label>Register Number:</label>
        <input type="input" name="registerNumber" pattern="[0-9]*$"/>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^[0-9]{5}$" required autofocus>
        <br>

        <label>Currencies:</label>
        <select name="currencyCode">
            <?php foreach ($currencies as $currency) : ?>
                <option value="<?php echo $curency['currency_code']; ?>">
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
    <p><a href="index.php?action=list_currencies">List Currencies</a></p>
</main>
<?php include './include/footer.php'; ?>