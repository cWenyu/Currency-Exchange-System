<?php
$title = 'User Login';
include 'include/header.php';

session_start();
if (isset($_SESSION['user_session']) != "") {
    header("location:user_controller.php?action=user_account");
}
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
                        <h2 class="pageTitle">User Login</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="login">
        <div class="container">
            <h2>Login</h2>
            <div class="col-md-6 log">			 
                <p>Welcome, please enter the folling to continue.</p>
                <p>If you have previously Login with us, <span>click here</span></p>
                <form method="post" id="login-form">
                    <div id="error">
                        <!-- error will be shown here ! -->
                    </div>

                    <h5>Register Number:</h5>

                    <div>
                        <input placeholder="Register Number" name="register_number" id="register_number" pattern="[0-9]*$"/>
                        <span id="check-e"></span>
                    </div>

                    <h5>Password:</h5>
                    <div>
                        <input type="password" placeholder="Register Password" name="password" id="register_password" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus />
                    </div>
                    <br/>
                    <div>
                        <button type="submit" name="btn-login" id="btn-login">
                            <i aria-hidden="true"></i>
                            Sign In
                        </button> 
                    </div>

                </form>				 
            </div>
            <!--                <a href="#">Forgot Password ?</a>-->
            <div class="col-md-6 login-right">
                <h3>NEW REGISTRATION</h3>
                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                <a class="user_buttons" href="?action=register_new_form">Create an Account</a>
            </div>

        </div>
        <div class="clearfix"></div>		 
    </div>
</div>
<?php include 'include/footer.php'; ?>
</body>


