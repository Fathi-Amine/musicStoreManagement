<?php
    include "workplaceHead.php";
?>
<div class="container-fluid rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">Edogaru</span>
                <span class="text-black-50">edogaru@mail.com.my</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Store name</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last name" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" value="" placeholder="FIrst Name">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control" placeholder="enter email id" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Confirm Password</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Zip</label>
                        <input type="text" class="form-control" placeholder="Enter a zip code" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Country</label>
                        <input type="text" class="form-control" placeholder="country" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" value="" placeholder="City">
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
    include "workplaceFooter.php"
?>