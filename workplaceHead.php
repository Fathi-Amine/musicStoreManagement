<?php
include "header.php";
include "scripts.php";
if(!isset($_SESSION['firstName'])){
    header("Location: index.php");
}
?>
<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark flex-shrink-1">
            <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center p-2 text-center">
                <a class="navbar-brand mw-25" href="#">
                <img src="assets/Logo.png" class="logo"alt="">
                </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-5" id="nav">
                    <ul class="navbar-nav flex-column justify-content-center me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link btn btn-outline-light">Search</a>
                        </li>
                    </ul>
                    </div>
                </nav>
            
        </aside>
        <main class="col">
            <section class="dashboard container-fluid mt-3">
                <div class="d-flex justify-content-between">
                    <div class="nav-item d-flex">
                        <img src="assets/vicky-hladynets-uyaTT9u6AvI-unsplash.jpg" class="img-fluid"alt="">
                        <div class="fullName d-flex align-items-center ms-2">
                            <span class="first fw-bolder text-light"><?= $_SESSION['lastName'] ?></span>
                            <span class="last ms-1 fw-bolder text-light"><?=$_SESSION['firstName']?></span>
                        </div>
                    </div> 
                    <form class="d-none d-md-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </section>