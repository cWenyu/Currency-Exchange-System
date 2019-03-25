<?php include './include/header.php'; ?>
<main>
    <h2>Buy Currency</h2>
    <form action="user_controller.php" method="post" id="buy_currency_form">
        <input type="hidden" name="action" value="buy_currency">

        <!--input-->
        <label>Register Number:</label>
        <input type="input" name="registerNumber" pattern="[0-9]*$"/>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus>
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
    <p><a href="view/user_view/home.php">List Currencies</a></p>
</main>
<?php include './include/footer.php'; ?>