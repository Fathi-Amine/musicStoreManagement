<?php
include "header.php";
include "nav.php";
include "scripts.php";
session_start();
if(!isset($_SESSION["userId"])){
    header("location: login.php");
}else{
    header("location: dashboard.php");
}
?>

    <h1 class="text-center text-light mt-5">Be the world's bridge to compose</h1>
    <p class="text-center text-light mt-5">Platform for Selling instruments and its accessories</p>
<?php
    include "footer.php"
?>