<?php include './include/header.php'; ?>
<main>

    <h2><?php echo$cardHolder ?>'s Product List</h2>
    <section>
        <table>
            <tr>
                <th>Currency Name</th>
                <th>Quantity</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($userCurrencies as $userCurrency) : ?>
                <tr>
                    <td><?php echo $userCurrency['currency_name']; ?></td>    
                    <td><?php echo $userCurrency['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=list_currencies">List Currencies</a></p>
    </section>
</section>

</main>
<?php include './include/footer.php'; ?>