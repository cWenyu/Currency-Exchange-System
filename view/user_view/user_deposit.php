<?php include 'include/header.php'; ?>
<body>
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
    <p><a href="user_controller.php?action=user_account">List Currencies</a></p>
</body>
<?php include 'include/footer.php'; ?>