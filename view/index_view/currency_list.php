<?php include './include/header.php'; ?>
<main>

    <h2>Financial Currencies List</h2>
    <section>
        <table>
            <tr>
                <th>Currency Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($currencies as $currency) : ?>
                <tr>
                    <td><?php echo $currency['currency_name']; ?></td>    
                    <td><?php echo $currency['currency_description']; ?></td>
                    <td><?php echo $currency['currency_price']; ?></td>   
                  
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="view/index_view/userLogIn.php">Login</a></p>
        <p><a href="?action=register_new_form">Register</a></p>
    </section>
</section>

</main>

<?php include './include/currency_converter.php'; ?>
<?php include './include/footer.php'; ?>