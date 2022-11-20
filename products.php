<?php
include "workplaceHead.php";
?>
<section class="container-fluid">
    <div class="cards-container">
        
            <?php
                $instruments = getProducts();
                foreach($instruments as $instrument):?>
                    <div class="content-card" id="instrument-<?=$instrument["id"]?>">
                        <div class="top-half" style="background-image: url(assets/polygon-group-StUN27yM1mo-unsplash.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
                            <!-- <img src="<?=$instrument["instrument_img"]?>" alt="" > -->
                        </div>
                        <div class="bottom-half">
                            <h1 id="instrument-name" data-name="<?=$instrument["instrument_name"]?>"><?=$instrument["instrument_name"]?> <span class="brand-span" id="brand" data-brand="<?=$instrument["brand"]?>"><?=$instrument["brand"]?></span></h1>
                            <span id="category" class="text-secondary" data-category="<?=$instrument["category"]?>"><?=$instrument["instrumentCategory"]?></span>
                            <p id="desc" data-description="<?=$instrument["description"]?>" class="description-text text-truncate"><?=$instrument["description"]?></p>
                            <div class="d-flex mt-1">
                                <span id="price" data-price="<?=$instrument["price"]?>">Price: $<?=$instrument["price"]?></span>
                                <span class="ms-auto" id="quantity" data-quantity="<?=$instrument["quantity"]?>">Quantity: <?=$instrument["quantity"]?></span>
                            </div>
                            <div class="btns mt-3 d-flex">
                                <button type="button"class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal" onclick="edit(<?=$instrument['id']?>)">Update</button>
                                <button type="button" class="btn btn-sm btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#operationModal" onclick="edit(<?=$instrument['id']?>)">Delete</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach?>
            <!-- <div class="top-half">
                <img src="assets/vicky-hladynets-uyaTT9u6AvI-unsplash.jpg" c alt="">
            </div>
            <div class="bottom-half">
                <h1>Name</h1>
                <span class="text-secondary">category</span>
                <p class="description-text text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta assumenda ad obcaecati voluptatibus commodi nisi expedita sunt cupiditate voluptate ullam?</p>
                <div class="d-flex mt-1">
                    <span>price</span>
                    <span class="ms-auto">quantity</span>
                </div>
                <div class="btns mt-3 d-flex">
                    <button type="button"class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal" onclick="">Update</button>
                    <button type="button" class="btn btn-sm btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#operationModal">Delete</button>
                </div>
            </div>
        </div> -->
        <!-- <div class="content-card">
            <div class="top-half">
                <img src="assets/vicky-hladynets-uyaTT9u6AvI-unsplash.jpg" alt="">
            </div>
            <div class="bottom-half">
                <h1>Name</h1>
                <span class="text-secondary">category</span>
                <p class="description-text text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta assumenda ad obcaecati voluptatibus commodi nisi expedita sunt cupiditate voluptate ullam?</p>
                <div class="d-flex mt-1">
                    <span>price</span>
                    <span class="ms-auto">quantity</span>
                </div>
                <div class="btns mt-3 d-flex">
                    <button type="button"class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal">Update</button>
                    <button type="button" class="btn btn-sm btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#operationModal">Delete</button>
                </div>
            </div>
        </div>
        <div class="content-card">
            <div class="top-half">
             <img src="assets/vicky-hladynets-uyaTT9u6AvI-unsplash.jpg" alt="">
            </div>
            <div class="bottom-half">
                <h1>Name</h1>
                <span class="text-secondary">category</span>
                <p class="description-text text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta assumenda ad obcaecati voluptatibus commodi nisi expedita sunt cupiditate voluptate ullam?</p>
                <div class="d-flex mt-1">
                    <span>price</span>
                    <span class="ms-auto">quantity</span>
                </div>
                <div class="btns mt-3 d-flex">
                    <button type="button"class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal">Update</button>
                    <button type="button" class="btn btn-sm btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#operationModal">Delete</button>
                </div>
            </div>
        </div>
            <div class="content-card">
                <div class="top-half">
                <img src="assets/vicky-hladynets-uyaTT9u6AvI-unsplash.jpg" alt="">
                </div>
                <div class="bottom-half">
                    <h1>Name</h1>
                    <span class="text-secondary">category</span>
                    <p class="description-text text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta assumenda ad obcaecati voluptatibus commodi nisi expedita sunt cupiditate voluptate ullam?</p>
                    <div class="d-flex mt-1">
                        <span>price</span>
                        <span class="ms-auto">quantity</span>
                    </div>
                    <div class="btns mt-3 d-flex">
                        <button type="button"class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#operationModal" onclick="update>Update</button>
                        <button type="button" class="btn btn-sm btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#operationModal">Delete</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
                
<?php
    include "workplaceFooter.php"
?>