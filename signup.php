<?php
include "header.php";
include "nav.php";
?>
<div class="container mt-5 signup-sec" >
    <div class="row justify-content-center">
        <div class="col-6 bg-light p-3">
            <div class="img">
                <img src="assets/Logo.png" class="logo" alt="">
            </div>
            <?php if (isset($_SESSION['inputError'])): ?>
				<div class="alert alert-danger alert-dismissible fade show">
				<strong>Failure</strong>
					<?php 
						echo $_SESSION['inputError']; 
						unset($_SESSION['inputError']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
            <h2 class="mt-5">Compose your store.</h2>
            <p class="intro-text mt-3">This is the initial information about your business.
                You can change it anytime</p>
            <form action="scripts.php" method="POST">
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="storeName"id="storeName" placeholder="Store name">
                </div>
            <div class="row mt-3 gap-1">
                    <div class="form-group col-lg">
                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                    </div>
                    <div class="form-group col-lg">
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="confirmPass" id="conPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address 1">
                </div>
                <div class="row mt-3">
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="city" id="inputCity" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="zip" id="inputZip" placeholder="Zip code">
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <a href="#" class="col-md-4 align-middle">< go back</a>
                    <button type="submit" class="btn btn-dark btn-lg ms-auto align-self-center" name="signUp">Sign Up</button>
                </div>
                </form>
        </div>
    </div>
</div>
<?php
    include "footer.php"
?>