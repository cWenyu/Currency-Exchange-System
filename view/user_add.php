<?php include './include/header.php'; ?>
<main>
    <h2>Register</h2>
    <form action="index.php" method="post" id="register_new_form">
        <input type="hidden" name="action" value="register_new">
        
        <!--input-->
        <label>Card Number:</label>
        <input type="input" name="cardNumber" placeholder="Card Number" pattern="^[0-9]{16}$" required autofocus>
        <br>

        <label>Card holder:</label>
        <input type="input" name="cardHolder"  placeholder="Card Holder" pattern="^[ A-Za-z]*$" required autofocus>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^[0-9]{5}$" required autofocus>
        <br>

        <label>Deposit:</label>
        <input type="input" name="balance" pattern="^([0-9]*)+(.[0-9]{1,2})?$" placeholder="Deposit" required autofocus>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Register">
        <br>
    </form>
    <p><a href="index.php?action=list_products">List Products</a></p>
</main>
<?php include './include/footer.php'; ?>