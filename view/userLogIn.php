<?php
session_start();
if (isset($_SESSION['user_session']) != "") {
    header("Location: ./view/user_home.php");
}
?>
<?php include '../include/header.php'; ?>
<main>
    <h2>User Login</h2> 

    <form method="post" id="login-form">

        <div id="error">
            <!-- error will be shown here ! -->
        </div>

        <div>
            <input placeholder="Register Number" name="register_number" id="register_number" pattern="[0-9]*$"/>
            <span id="check-e"></span>
        </div>

        <div>
            <input type="password" placeholder="Register Password" name="password" id="register_password" pattern="^[0-9]{5}$" required autofocus />
        </div>

        <hr />

        <div>
            <button type="submit" name="btn-login" id="btn-login">
                <i aria-hidden="true"></i> &nbsp;
                    Sign In
            </button> 
        </div>

    </form>
    <p>
        <a href="../index.php?action=list_products">List Products</a>
    </p>
</main>
<?php include '../include/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/ee309940e2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/validation.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
