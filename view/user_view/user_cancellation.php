<?php
$title = "Cancellation";
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
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Login<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=user_login">User Login</a></li>
                                    <li><a href="?action=admin_login">Administration Login</a></li>
                                </ul>
                            </li>
                            <li><a href="?action=register_new_form">Register</a></li>
                            <li class="active"><a href="?action=user_cancellation_form">Account Cancellation</a></li>
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
                        <h2 class="pageTitle">Account Cancellation</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <h2>Cancellation</h2>
        <div class="col-md-6 log">			 

            <form action="index.php" method="post" id="user_cancellation_form">
                <input type="hidden" name="action" value="account_cancellation">
                <div class="col-md-6">
                    <h5>Register Number:</h5>

                    <div>
                        <input placeholder="Register Number" name="registerNumber" id="registerNumber" pattern="[0-9]*$"/>
                    </div>

                    <h5>Register Password:</h5>
                    <div>
                        <input type="password" placeholder="Register Password" name="registerPassword" id="registerPassword" pattern="^([a-zA-Z0-9!%^&*_@#~]){8,16}$" required autofocus />
                    </div>  
                    <br>
                    <button type="button" class="warning_buttons" data-toggle="modal" data-target="#exampleModal">
                        Confirm
                    </button>

                    <!-- dialog box -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Account </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Please click confirm to make sure your operation.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" id="warning_button">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form> 				 
        </div>		 
    </div>


</body>
<?php include './include/footer.php'; ?>