<?php
$title = 'Manager Login';
include 'include/header.php';

session_start();
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
                            <li class="active"><a href="?action=user_login">Administration Login</a></li>
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
                        <h2 class="pageTitle">Administration Login</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="login">
        <div class="container">
            <h2>Login</h2>
            <div class="col-md-6 log">			 

                <form method="post" id="ADlogin-form">
                    <div id="ADerror">
                        <!-- error will be shown here ! -->
                    </div>

                    <h5>Administration ID:</h5>

                    <div>
                        <input placeholder="Administration ID" name="admin_id" id="admin_id" pattern="[0-9]*$"/>
                        <span id="check-e"></span>
                    </div>

                    <h5>Password:</h5>
                    <div>
                        <input type="password" placeholder="Administration Password" name="admin_password" id="admin_password" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus />
                    </div>
                    <br/>
                    <div>
                        <button type="submit" name="btn-ADlogin" id="btn-ADlogin">
                            <i aria-hidden="true"></i>
                            Sign In
                        </button> 
                    </div>

                </form>				 
            </div>
            <div class="col-md-6 login-right">
                <h3>WARNING</h3>
                <p>If you forget your password please contact staff of IT department.</p>
            </div>
        </div>
        <div class="clearfix"></div>		 
    </div>
</div>
<?php include 'include/footer.php'; ?>
</body>