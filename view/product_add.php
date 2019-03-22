<?php include './include/header.php'; ?>
<main>
    <h2>Add Currency</h2>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_currency">

        <!-- next step: regex for each input-->
        <label>Name:</label>
        <input type="input" name="currencyName" placeholder="currency name">
        <br>

        <label>Description:</label>
        <input type="input" name="currencyDescription"  placeholder="currency description">
        <br>

        <label>Price:</label>
        <input type="input" name="currencyPrice" pattern="^([1-9][0-9]*)+(.[0-9]{1,2})?$" placeholder="currency price" required autofocus>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Add Currency">
        <br>
    </form>
    <p>
        <a href="index.php?action=list_products">View Currency List</a>
    </p>

</main>
<?php include './include/footer.php'; ?>