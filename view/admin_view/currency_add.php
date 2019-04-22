<?php
$title = "Add Currency";
include './include/header.php';
?>
<main>
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
                            <li><a href="admin_controller.php?action=list_currencies">Home</a></li> 
                            <li><a href="admin_controller.php?action=manager_login">Administration Login</a></li>
                            <li><a href="view/admin_view/admin_logout.php">Administration Logout</a></li>
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
                        <h2 class="pageTitle">Add Currency</h2>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <h2>Add Currency</h2>
        <div class="col-md-6 log">			 

            <form action="admin_controller.php" method="post" id="add_currency_form">
                <input type="hidden" name="action" value="add_currency">

                <div class="col-md-6">
                    <h5>Currency:</h5>
                    <div>
                        <input type="input" name="currencyName"placeholder="currency name" pattern="^[ A-Za-z0-9]*$" required autofocus>
                    </div>

                    <h5>Description:</h5>
                    <div>
                        <input type="input" name="currencyDescription" placeholder="currency description" pattern="^[ A-Za-z0-9]*$" required autofocus>

                    </div>  

                    <h5>Price:</h5>
                    <div>
                        <input type="input" name="currencyPrice" pattern="^([1-9][0-9]*)+(.[0-9]{1,2})?$" placeholder="currency price" required autofocus>
                    </div>
                    <br>
                    <button type="submit">
                        Add
                    </button>  
                </div>
            </form> 				 
        </div>		 
    </div>

</main>
<?php include './include/footer.php'; ?>