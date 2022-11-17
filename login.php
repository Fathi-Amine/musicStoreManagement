<?php
include "header.php";
include "nav.php";
?>

<div class="container mt-5 signup-sec" >
    <div class="row justify-content-center">
        <div class="col-6 bg-light justify-self-center p-3">
            <div class="img">
                <img src="assets/Logo.png" class="logo" alt="">
            </div>
            <h2 class="mt-5">Compose your store.</h2>
            <p class="intro-text mt-3">This is the initial information about your business.
                You can change it anytime</p>
            <form action="scripts.php" method="POST">
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="userEmail" id="email" placeholder="Email">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="d-flex align-items-center mt-3">
                    <a href="#" class="col-md-4 align-middle">< go back</a>
                    <button type="submit" name="logIn" class="btn btn-dark btn-lg ms-auto align-self-center">Sign Up</button>
                </div>
                </form>
        </div>
    </div>
</div>

<?php
    include "footer.php"
?>