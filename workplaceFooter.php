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
                        <form action="scripts.php" method="POST" enctype="multipart/form-data">
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