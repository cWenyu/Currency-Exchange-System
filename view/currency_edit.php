<?php include './include/header.php'; ?>
<main>
    <h2>Edit Currency</h2>
    <form action="index.php" method="post" id="add_currency_form">

        <input type="hidden" name="action" value="update_currency">

        <input type="hidden" name="currencyCode" value="<?php echo $currency['currency_code'] ?>">

        <label>Product Name:</label>
        <input type="input" name="currencyName" value="<?php echo $currency['currency_name']; ?>">
        <br>

        <label>Description:</label>
        <input type="input" name="currencyDescription" value="<?php echo $currency['currency_description']; ?>">
        <br>

        <label>Price:</label>
        <input type="input" name="currencyPrice" value="<?php echo $currency['currency_price']; ?>">
        <br>

        <hr/>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_currencies">View Currency List</a></p>

</main>
<?php include './include/footer.php'; ?>