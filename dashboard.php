<?php
include "workplaceHead.php";
?>

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
                <?php 
                    $prods = lastAdded();
                    
                    foreach($prods as $prod):?>
                    <tr id="instrument-<?=$prod["id"]?>">
                        <td>
                            <div class="d-flex align-items-center" style="width:64px; height:64px">
                                <img src="<?=$prod["instrument_img"]?>" alt="" class="img-fluid" width="50px">
                            </div>
                        </td>
                        <td id="instrument-name" data-name="<?=$prod["instrument_name"]?>" class="align-middle"><?=$prod["instrument_name"]?></td>
                        <td id="category" data-category="<?=$prod["category"]?>" class="align-middle"><?=$prod["category"]?></td>
                        <td class="align-middle"><?=$prod["created_date"]?></td>
                        <td id="price" data-price="<?=$prod["price"]?>" class="align-middle"><?=$prod["price"]?></td>
                        <td id="quantity" data-quantity="<?=$prod["quantity"]?>" class="align-middle"><?=$prod["quantity"]?></td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" onclick="location.href='scripts.php?id=<?php echo $prod['id'] ?>'">Delete</button>
                            
                        </td>
                    </tr>
                <?php endforeach?>
                
            </tbody>
        </table>
    </div>
    
</section>
                
<?php
    include "workplaceFooter.php"
?>