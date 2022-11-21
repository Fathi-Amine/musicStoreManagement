<?php
include "header.php";
include "nav.php";
session_start();
?>

<div class="container mt-5 signup-sec" >
    <div class="row justify-content-center">
        <div class="col-6 bg-light justify-self-center p-3">
            <div class="img">
                <img src="assets/Logo.png" class="logo" alt="">
            </div>
            <h2 class="mt-5">Compose your store.</h2>
            <p class="intro-text mt-3">Here you log in to your account</p>
            <?php if (isset($_SESSION['Incorrect'])): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Failure</strong>
                <?php 
                    echo $_SESSION['Incorrect']; 
                    unset($_SESSION['Incorrect']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
            </div>
			<?php endif ?>
            <form action="scripts.php" method="POST">
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="userEmail" id="email" placeholder="Email">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <a href="#" class="col-md-4 align-middle">< go back</a>
                    <button type="submit" name="logIn" class="btn btn-dark btn-lg ms-auto align-self-center">Log in</button>
                </div>
                </form>
        </div>
    </div>
</div>

<?php
    include "footer.php"
?>