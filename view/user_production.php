<?php include './include/header.php'; ?>
<main>

    <h2><?php echo$cardHolder ?>'s Product List</h2>
    <section>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($userProducts as $userProduct) : ?>
                <tr>
                    <td><?php echo $userProduct['product_name']; ?></td>    
                    <td><?php echo $userProduct['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=list_products">List Products</a></p>
    </section>
</section>

</main>
<?php include './include/footer.php'; ?>