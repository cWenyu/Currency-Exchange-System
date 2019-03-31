<?php include './include/header.php'; ?>
<main>
    <h2>Cancellation</h2>
    <h3>
        Please enter your information to make sure your operation.
    </h3>
    <form action="user_controller.php" method="post" id="user_cancellation_form">
        <input type="hidden" name="action" value="user_account_cancellation">

        <!-- next step: regex for each input-->
        <label>Register Number:</label>
        <input type="input" name="registerNumber" placeholder="Register Number" pattern="^[0-9]*$" required autofocus>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Confirm">
        <br>
    </form>
    <p><a href="user_controller.php?action=list_user_currencies">List Currencies</a></p> 
</main>
<?php include './include/footer.php'; ?>