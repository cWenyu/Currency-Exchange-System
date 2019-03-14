<?php include './include/header.php'; ?>
<main>

    <h2>Financial Products List</h2>
    <section>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['product_name']; ?></td>    
                    <td><?php echo $product['product_description']; ?></td>
                    <td><?php echo $product['product_price']; ?></td>   
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="edit_product">
                            <input type="hidden" name="productCode" value="<?php echo $product['product_code']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_product">
                            <input type="hidden" name="productCode" value="<?php echo $product['product_code']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=list_products">List Products</a></p>
        <p><a href="?action=add_product_form">Add Product</a></p>
        <p><a href="view/userLogIn.php">Quick Check Balance</a></p>
        <p><a href="?action=buy_product_form">Buy Product</a></p>
        <p><a href="?action=register_new_form">Register</a></p>
        <p><a href="?action=user_cancellation_form">Account Cancellation</a></p>
    </section>
</section>

</main>
<?php include './include/footer.php'; ?>