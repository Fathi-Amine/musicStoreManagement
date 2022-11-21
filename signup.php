<?php
include "header.php";
include "nav.php";
session_start();
?>
<div class="container mt-5 signup-sec" >
    <div class="row justify-content-center">
        <div class="col-6 bg-light p-3">
            <div class="img">
                <img src="assets/Logo.png" class="logo" alt="">
            </div>
            <?php if (isset($_SESSION['inputError'])): ?>
				<div class="alert alert-danger alert-dismissible fade show mt-2">
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
            <form data-parsley-validate action="scripts.php" method="POST">
                <div class="form-group mt-3">
                    <input pattern="^[a-zA-Z\s]+$" type="text" class="form-control" name="storeName"id="storeName" placeholder="Store name" required>
                </div>
            <div class="row mt-3 gap-1">
                    <div class="form-group col-lg">
                    <input pattern="^[a-zA-Z\s]+$"type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                    </div>
                    <div class="form-group col-lg">
                    <input pattern="^[a-zA-Z\s]+$" type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[a-z]{2,4}$" type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group mt-3">
                    <input data-parsley-equalto="#password" type="password" class="form-control" name="confirmPass" id="conPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address 1" required>
                </div>
                <div class="row mt-3">
                    <div class="form-group col-md-6">
                    <input pattern="^[a-zA-Z\s]+$" type="text" class="form-control" name="city" id="inputCity" placeholder="City" required>
                    </div>
                    <div class="form-group col-md-6">
                    <input data-parsley-type="digits" type="number" class="form-control" name="zip" id="inputZip" placeholder="Zip code" required>
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