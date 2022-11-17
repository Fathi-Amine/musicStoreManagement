<?php
include "header.php";
include "scripts.php"

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
                <section class="container-fluid mt-4">
                  <div class="row gap-2 justify-content-center">
                    <div class="position-relative card p-0" style="width: 15rem;">
                        <div class="position-absolute h-100 bg-primary end-0 rounded-end translate-end-x" style="width: 4px;"></div>
                        <div class="card-body">
                            <ul class="card-list p-0">
                                <li class="list-group-item"><img src="assets/wallet.png" class="box-icon"alt=""></li>
                                <li class="list-group-item"><h3 class="fw-bolder mt-3 mb-0 d-inline-block">$12,345.00</h3></li>
                                <li class="list-group-item"><h5 class="mt-3 mb-0 d-inline-block">Stock value</h3></li>
                            </ul>
                        </div>
                    </div>
                        <div class="position-relative card p-0" style="width: 15rem;">
                            <div class="position-absolute h-100 bg-success end-0 rounded-end translate-end-x" style="width: 4px;"></div>
                            <div class="card-body">
                                <ul class="card-list p-0">
                                    <li class="list-group-item"><img src="assets/wallet.png" class="box-icon"alt=""></li>
                                    <li class="list-group-item"><h3 class="fw-bolder mt-3 mb-0 d-inline-block">$12,345.00</h3></li>
                                    <li class="list-group-item"><h5 class="mt-3 mb-0 d-inline-block">Stock value</h3></li>
                                </ul>
                            </div>
                        </div>
                        <div class="position-relative card p-0" style="width: 15rem;">
                            <div class="position-absolute h-100 bg-warning end-0 rounded-end translate-end-x" style="width: 4px;"></div>
                            <div class="card-body">
                                <ul class="card-list p-0">
                                    <li class="list-group-item"><img src="assets/wallet.png" class="box-icon"alt=""></li>
                                    <li class="list-group-item"><h3 class="fw-bolder mt-3 mb-0 d-inline-block">$12,345.00</h3></li>
                                    <li class="list-group-item"><h5 class="mt-3 mb-0 d-inline-block">Stock value</h3></li>
                                </ul>
                            </div>
                        </div>
                        <div class="position-relative card p-0" style="width: 15rem;">
                            <div class="position-absolute h-100 bg-danger end-0 rounded-end translate-end-x" style="width: 4px;"></div>
                            <div class="card-body">
                                <ul class="card-list p-0">
                                    <li class="list-group-item"><img src="assets/wallet.png" class="box-icon"alt=""></li>
                                    <li class="list-group-item"><h3 class="fw-bolder mt-3 mb-0 d-inline-block">$12,345.00</h3></li>
                                    <li class="list-group-item"><h5 class="mt-3 mb-0 d-inline-block">Stock value</h3></li>
                                </ul>
                            </div>
                        </div>
                  </div>
                </section>
                <section class="container-fluid m-auto mt-4 row">
                    <h4 class="text-light ms-2">Last added Products</h4>
                    <div class="col p-3">
                        <table class="table table-responsive bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">image</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="./assets/Logo.png" alt="" class="" width="50px">
                                        </div>
                                    </td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr> -->
                                <?php 
                                    $prods = lastAdded();
                                    
                                    foreach($prods as $prod):?>
                                    <tr id="instrument-<?=$prod["id"]?>">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/Logo.png" alt="" class="" width="50px">
                                            </div>
                                        </td>
                                        <td id="instrument-name" data-name="<?=$prod["instrument_name"]?>"><?=$prod["instrument_name"]?></td>
                                        <td id="brand" data-brand="<?=$prod["brand"]?>"><?=$prod["brand"]?></td>
                                        <td id="category" data-category="<?=$prod["category"]?>"><?=$prod["category"]?></td>
                                        <td><?=$prod["created_date"]?></td>
                                        <td id="price" data-price="<?=$prod["price"]?>"><?=$prod["price"]?></td>
                                        <td id="quantity" data-quantity="<?=$prod["quantity"]?>"><?=$prod["quantity"]?></td>
                                        <td class="text-truncate"id="desc" data-quantity="<?=$prod["description"]?>"><?=$prod["description"]?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" onclick="location.href='scripts.php?id=<?php echo $prod['id'] ?>'">Delete</button>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="update(<?=$prod['id']?>)">edit</button>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                </section>
                <section>
                     <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Instrument
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="scripts.php" method="POST">
                            <div>
                                <input type="hidden" name="instrumentId" id="idInput">
                            </div>
                            <div class="mb-3">
                                <label for="instrumentName" class="form-label">Instrument name</label>
                                <input type="text" class="form-control" name="instrumentName" id="instrumentName">
                            </div>
                            <div class="mb-3">
                                <label for="instrument-img" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="instrumentImg" id="instrumentImg">
                            </div>
                            <div class="mb-3 form-select-box">
                                <label class="form-select-label" for="selectBox">Category</label>
                                <select class="form-select" id="selectBox" name="category">
                                    <option selected>Choose a category</option>
                                    <option value="1">Brass</option>
                                    <option value="2">KeyBoards</option>
                                    <option value="3">Percussion</option>
                                    <option value="4">Strings</option>
                                    <option value="5">Woodwind</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="instrumentBrand" class="form-label">Brand</label>
                                <input type="text" class="form-control" name="instrumentBrand" id="instrumentBrand">
                            </div>
                            <div class="mb-3">
                                <label for="instrumentPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" name="instrumentPrice" id="instrumentPrice" step="0.1">
                            </div>
                            <div class="mb-3">
                                <label for="instrumentQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="instrumentQuantity" id="instrumentQuantity">
                            </div>
                            <div class="mb-3">
                                <label for="instrumentDescription" class="form-label">Description</label>
                                <input type="number" class="form-control" name="instrumentDescription" id="instrumentDescription">
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addInstrument">Save changes</button>
                                <button type="submit" class="btn btn-danger" name="update">Update changes</button>
                                <button type="submit" class="btn btn-danger" name="delete" >Delete changes</button>

                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
<?php
    include "footer.php"
?>