<?php
$title = 'Account';
include 'include/header.php';
require_once('model/currency_db.php');
require_once('model/user_db.php');

include_once 'model/database.php';
$stmt = $db->prepare("SELECT card_holder,balance FROM users_accounts WHERE register_number=:register_number");
$stmt->execute(array(":register_number" => $_SESSION['user_session']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$currencies = user_currency($_SESSION['user_session']);
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
                            <li class="active"><a href="?action=user_login">Login</a></li>
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
                        <h2 class="pageTitle">Account</h2>
                    </div>
                </div>
            </div>
        </section>


        <div id="content">
            <div class="container content">	
                <div class="row">
                    <div class="col-md-12">
                        <div><h2>Balance</h2></div>
                        <h3>Hi <?php echo $row['card_holder']; ?>: </h3>

                        <div class="col-lg-12">

                            <h4>
                                Your Balance is <span class="balance"> <?php echo $row['balance'] ?> </span>€.
                            </h4> 

                            <div><h4>Account Details</h4></div>
                            <div>
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Currency</th>
                                            <th>Quantity</th>
                                        </tr>  
                                    </thead>

                                    <tbody class="tbody">
                                        <?php foreach ($currencies as $currency) : ?>
                                            <tr>
                                                <td><?php echo $currency['currency_name']; ?></td>    
                                                <td><?php echo $currency['quantity']; ?></td>   
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table> 
                            </div>

                            <button class="user_buttons">
                                <a href="user_controller.php?action=user_buy_currency_form">Buy Currency</a>
                            </button>
                            <button class="user_buttons">
                                <a href="user_controller.php?action=user_cash_deposit_form">Deposit</a>
                            </button>
                            <button class="user_buttons">
                                <a href="user_controller.php?action=user_cancellation_form">Account Cancellation</a>
                            </button>

                            <button class="user_buttons">
                                <a href="view/user_view/logout.php"><i aria-hidden="true"></i> &nbsp;Sign Out</a> 
                            </button>


                        </div>
                    </div> 
                </div>		
            </div>
        </div>
    </div>
    <?php include 'include/footer.php'; ?>
</body>


