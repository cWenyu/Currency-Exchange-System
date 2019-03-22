<?php include './include/header.php'; ?>
<main>
    <h1 class="top">Database Error</h1>
    <p>There was an error connecting to the database.</p>
    <p>Please check your details and try again.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>&nbsp;</p>
</main>
<?php include './include/footer.php'; ?>