<?php
$title = "Register";
include './include/header.php';
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
                            <li class="active"><a href="?action=user_login">User Login</a></li>
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
                        <h2 class="pageTitle">Retrieve Register Number</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="login">
        <div class="container">
            <h2>Retrieve Register Number</h2>
            <div class="col-md-6 log">			 

                <form action="index.php" method="post" id="forget_registerNo_form">
                    <input type="hidden" name="action" value="retrive_registNo">

                    <div class="col-md-6" >
                        <h5>Card Number:</h5>
                        <div>
                            <input type="input" name="cardNumber" id="cardNumber" placeholder="Card Number" pattern="^[0-9]{16}$" required autofocus>
                        </div>

                        <h5>Card Holder:</h5>
                        <div>
                            <input type="input" name="cardHolder" id="cardHolder" placeholder="Card Holder" pattern="^[ A-Za-z]*$" required autofocus>
                        </div> 
                        <br>
                        <button type="submit" class="btn" id="btn-regist">
                            Submit
                        </button>

                    </div>

                </form> 				 
            </div>	 
            <div class="col-md-6 login-right">
                <h3>Forget Password</h3>
                <p>If you forget password please click here to reset your password.</p>
                <a class="user_buttons" href="?action=reset_password_form">Reset Password</a>
            </div>	 
        </div>
    </div>
    <?php include './include/footer.php'; ?>   
</body>
