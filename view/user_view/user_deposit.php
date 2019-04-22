<?php
$title = "Deposit";
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
                        <h2 class="pageTitle">Deposit</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <h2>Cash Deposit</h2>
        <div class="col-md-6">			 
            <form action="user_controller.php" method="post" id="cash_deposit_form">
                <input type="hidden" name="action" value="cash_deposit">
                <div class="col-md-6">
                    <h5>Deposit:</h5>
                    <div>
                        <input type="input" name="deposit" placeholder="Deposit" pattern="[0-9]*$" required autofocus />
                    </div>  
                    <input type="submit" value="Submit" class="user_buttons">    
                </div>

            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</body>
<?php include 'include/footer.php'; ?>