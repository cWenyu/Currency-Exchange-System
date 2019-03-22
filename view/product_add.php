<?php include './include/header.php'; ?>
<main>
    <h2>Add Product</h2>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <!-- next step: regex for each input-->
        <label>Name:</label>
        <input type="input" name="productName" placeholder="product name">
        <br>

        <label>Description:</label>
        <input type="input" name="productDescription"  placeholder="product description">
        <br>

        <label>Price:</label>
        <input type="input" name="productPrice" pattern="^([1-9][0-9]*)+(.[0-9]{1,2})?$" placeholder="product price" required autofocus>
        <br>

        <hr/>
        <label>&nbsp;</label>
        <input type="submit" value="Add Product">
        <br>
    </form>
    <p>
        <a href="index.php?action=list_products">View Product List</a>
    </p>

</main>
<?php include './include/footer.php'; ?>