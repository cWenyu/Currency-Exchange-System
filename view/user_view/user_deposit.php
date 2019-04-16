<?php include './include/header.php'; ?>
<main>
    <h2>Cash Deposit</h2>
    <form action="user_controller.php" method="post" id="cash_deposit_form">
        <input type="hidden" name="action" value="cash_deposit">

        <label>Deposit:</label>
        <input type="input" name="deposit" placeholder="Deposit" pattern="[0-9]*$" required autofocus />
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Submit">
        <br>
    </form>
    <p><a href="view/user_view/user_currency_list.php">List Currencies</a></p>
</main>
<?php include './include/footer.php'; ?>