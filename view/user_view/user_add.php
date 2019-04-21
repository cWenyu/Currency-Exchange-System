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
                            <li><a href="?action=user_login">Login</a></li>
                            <li class="active"><a href="?action=register_new_form">Register</a></li>
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
                        <h2 class="pageTitle">Register</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <h2>Register</h2>
        <div class="col-md-6 log">			 

            <form action="index.php" method="post" id="register_new_form">
                <input type="hidden" name="action" value="register_new">

                <div class="col-md-6">
                    <h5>Card Number:</h5>

                    <div>
                        <input type="input" name="cardNumber" placeholder="Card Number" pattern="^[0-9]{16}$" required autofocus>
                    </div>

                    <h5>Card holder:</h5>
                    <div>
                        <input type="input" name="cardHolder"  placeholder="Card Holder" pattern="^[ A-Za-z]*$" required autofocus>
                    </div>  
                </div>

                <div class="col-md-6">
                    <h5>Register Password:</h5>
                    <div>
                        <input type="password" name="registerPassword" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus>
                    </div>

                    <h5>Deposit:</h5>
                    <div>
                        <input type="input" name="balance" pattern="^([0-9]*)+(.[0-9]{1,2})?$" placeholder="Deposit" required autofocus>
                    </div> 
                    <br>
                    <button type="submit" class="btn">
                        Register
                    </button>  
                </div>
            </form> 				 
        </div>		 
    </div>


    <p><a href="index.php?action=list_currencies">List Currencies</a></p>
</body>
<?php include './include/footer.php'; ?>