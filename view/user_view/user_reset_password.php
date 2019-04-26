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
                        <h2 class="pageTitle">Reset Password</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="login">
        <div class="container">
            <h2>Reset Password</h2>
            <div class="col-md-6 log">			 

                <form action="index.php" method="post" id="reset_password_form">
                    <input type="hidden" name="action" value="reset_password">

                    <div class="col-md-6" >
                        <h5>Register Number:</h5>
                        <div>
                            <input placeholder="Register Number" name="register_number" id="register_number" pattern="[0-9]*$"/>
                            <span id="check-e"></span>
                        </div>

                        <h5>Card Number:</h5>
                        <div>
                            <input type="input" name="cardNumber" id="cardNumber" placeholder="Card Number" pattern="^[0-9]{16}$" required autofocus>
                        </div>

                        <h5>Card holder:</h5>
                        <div>
                            <input type="input" name="cardHolder" id="cardHolder" placeholder="Card Holder" pattern="^[ A-Za-z]*$" required autofocus>
                        </div> 

                        <h5>New Password:</h5>
                        <div>
                            <input type="password" placeholder="New Password" name="new_password" id="new_password" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus />
                        </div> 
                        <br>
                        <button type="submit" class="btn" id="btn-regist">
                            Submit
                        </button>

                    </div>

                </form> 				 
            </div>	 
            <div class="col-md-6 login-right">
                <h3>Forget Register Number</h3>
                <p>If you forget register number please click here to retrieve your register number.</p>
                <a class="user_buttons" href="?action=forget_registerNo_form">Forget Register Number</a>
            </div>	 
        </div>
    </div>
    <?php include './include/footer.php'; ?>   
</body>
