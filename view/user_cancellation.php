<?php include './include/header.php'; ?>
<main>
    <h2>Cancellation</h2>
    <h3>
        Please enter your information to make sure your operation.
    </h3>
    <form action="index.php" method="post" id="user_cancellation_form">
        <input type="hidden" name="action" value="account_cancellation">

        <!-- next step: regex for each input-->
        <label>Register Number:</label>
        <input type="input" name="registerNumber" placeholder="Register Number" pattern="^[0-9]*$" required autofocus>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^[0-9]{5}$" required autofocus>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Confirm">
        <br>
    </form>
    <p><a href="index.php?action=list_products">List Products</a></p> 
</main>
<?php include './include/footer.php'; ?>