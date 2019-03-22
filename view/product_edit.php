<?php include './include/header.php'; ?>
<main>
    <h2>Edit Product</h2>
    <form action="index.php" method="post" id="add_product_form">

        <input type="hidden" name="action" value="update_product">

        <input type="hidden" name="productCode" value="<?php echo $product['product_code'] ?>">

        <label>Product Name:</label>
        <input type="input" name="productName" value="<?php echo $product['product_name']; ?>">
        <br>

        <label>Description:</label>
        <input type="input" name="productDescription" value="<?php echo $product['product_description']; ?>">
        <br>

        <label>Price:</label>
        <input type="input" name="productPrice" value="<?php echo $product['product_price']; ?>">
        <br>

        <hr/>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_products">View Product List</a></p>

</main>
<?php include './include/footer.php'; ?>