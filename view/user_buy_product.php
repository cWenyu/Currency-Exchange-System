<?php include './include/header.php'; ?>
<main>
    <h2>Register</h2>
    <form action="index.php" method="post" id="buy_product_form">
        <input type="hidden" name="action" value="buy_product">

        <!--input-->
        <label>Register Number:</label>
        <input type="input" name="registerNumber" pattern="[0-9]*$"/>
        <br>

        <label>Register Password:</label>
        <input type="password" name="registerPassword" pattern="^[0-9]{5}$" required autofocus>
        <br>

        <label>Products:</label>
        <select name="productCode">
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['product_code']; ?>">
                    <?php echo $product['product_name'];?>
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
    <p><a href="index.php?action=list_products">List Products</a></p>
</main>
<?php include './include/footer.php'; ?>