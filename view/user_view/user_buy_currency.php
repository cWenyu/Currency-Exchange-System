<?php
$title = "Buy Currency";
include 'include/header.php';
?>
<body>
    <div id="wrapper" class="home-page">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="img/logo_1.png" alt="logo"/></a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li> 
                            <li class="active"><a href="?action=user_login">User Account</a></li>
                            <li><a href="?action=register_new_form">Register</a></li>
                            <li><a href="?action=user_cancellation_form">Account Cancellation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">Account-Buy Currency</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <h2>Buy Currency</h2>
        <div class="col-md-6">			 
            <form action="user_controller.php" method="post" id="buy_currency_form">
                <input type="hidden" name="action" value="buy_currency">

                <div class="select_group">
                    <label>Currencies:</label>
                    <select name="currencyCode">
                        <?php foreach ($currencies as $currency) : ?>
                            <option value="<?php echo $currency['currency_code']; ?>">
                                <?php echo $currency['currency_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="select_group">
                    <label>Quantity: </label>
                    <input type="input" name="quantity" pattern="[0-9]*$"/>
                </div>

                <input type="submit" value="Submit" class="user_buttons">
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php include './include/footer.php'; ?>
</body>
