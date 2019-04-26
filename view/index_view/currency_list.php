<?php
$title = 'Home';
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
                            <li class="active"><a href="index.php">Home</a></li> 
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Login<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?action=user_login">User Login</a></li>
                                    <li><a href="?action=admin_login">Administration Login</a></li>
                                </ul>
                            </li>
                            <li><a href="?action=register_new_form">Register</a></li>
                            <li><a href="?action=user_cancellation_form">Account Cancellation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->


        <section id="banner">
            <div id="main-slider" class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="img/slides/1.jpg" alt="flexslider" /> 
                        <div class="flex-caption">
                            <h3>CONSULTING</h3> 
                            <p>Real-time currency rate</p>  
                        </div> 
                    </li>
                    <li>
                        <img src="img/slides/2.jpg" alt="flexslider" /> 
                        <div class="flex-caption">
                            <h3>FINANCIAL</h3> 
                            <p>Online currency exchange</p>  
                        </div> 
                    </li>
                </ul>
            </div>
            <!-- end slider -->
        </section>  


        <section class="jumbobox">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div><h1>Financial Currencies List</h1></div>
                        <div>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Currency Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>  
                                </thead>

                                <tbody class="tbody">
                                    <?php foreach ($currencies as $currency) : ?>
                                        <tr>
                                            <th><?php echo $currency['currency_name']; ?></th>    
                                            <td><?php echo $currency['currency_description']; ?></td>
                                            <td><?php echo $currency['currency_price']; ?></td>   

                                        </tr>
                                    <?php endforeach; ?> 

                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include 'include/currency_converter.php';
    ?>

    <!-- cooperators logo -->

    <?php
    include 'include/footer.php';
    ?>
    <script src="js/jquery.easing.1.3.js"></script>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body>    
