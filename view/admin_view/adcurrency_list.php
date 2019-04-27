<?php
$title = 'Home';
include 'include/header.php';

$stmt = $db->prepare("SELECT admin_name FROM admin_accounts WHERE admin_id=:admin_id");
$stmt->execute(array(":admin_id" => $_SESSION['admin_session']));
$adminName= $stmt->fetch()[0];
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
                            <li class="active"><a href="admin_controller.php?action=list_currencies">Home</a></li> 
                            <li><a href="admin_controller.php?action=manager_login">Administration Login</a></li>
                            <li><a href="view/admin_view/admin_logout.php">Administration Logout</a></li>
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


        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Hi, <?php echo $adminName?></h1>
                        <div>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Currency Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Add</th>
                                    </tr>  
                                </thead>

                                <tbody class="tbody">
                                    <?php foreach ($currencies as $currency) : ?>
                                        <tr>
                                            <th><?php echo $currency['currency_name']; ?></th>    
                                            <td><?php echo $currency['currency_description']; ?></td>
                                            <td><?php echo $currency['currency_price']; ?></td>   
                                            <td>
                                                <form action="admin_controller.php" method="post">
                                                    <input type="hidden" name="action" value="edit_currency">
                                                    <input type="hidden" name="currencyCode" value="<?php echo $currency['currency_code']; ?>">
                                                    <input type="submit" value="Edit">
                                                </form>
                                            </td>
                                            <td>
                                                <form action="admin_controller.php" method="post">
                                                    <input type="hidden" name="action" value="delete_currency">
                                                    <input type="hidden" name="currencyCode" value="<?php echo $currency['currency_code']; ?>">
                                                    <input type="submit" value="Delete">
                                                </form>
                                            </td>
                                            
                                            <td>
                                                <form method="get">
                                                    <input type="hidden" name="action" value="add_currency_form">
                                                    <input type="submit" value="Add">
                                                </form>
                                            </td>
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
    include 'include/footer.php';
    ?>
    <script src="js/jquery.easing.1.3.js"></script>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body>    
