<?php
include "database.php";

session_start();
if(isset($_POST['signUp']))  signUp();
if(isset($_POST['logIn']))  logIn();
if(isset($_POST['addInstrument']))  addInstrument();
if(isset($_POST['update']))  updateInstrument();
if(isset($_POST['delete']))  deleteInstrument();

function validateInputs($input){
    $input = trim($input);
    $input = preg_replace('/\s+/', ' ',$input);
    $input = htmlspecialchars($input);

    return $input;
}
function signUp(){

    global $conn;
    $storeName = validateInputs($_POST["storeName"]);
    $firstName = validateInputs($_POST["firstName"]);
    $lastName = validateInputs($_POST["lastName"]);
    $email = validateInputs($_POST["email"]);
    $password = validateInputs($_POST["password"]);
    $confirmPassword = validateInputs($_POST["confirmPass"]);
    $address = validateInputs($_POST["address"]);
    $city = validateInputs($_POST["city"]);
    $zip = validateInputs($_POST["zip"]);

    
    $storeName_query = "SELECT * FROM `admin` WHERE storeName = '$storeName'";
    $storeName_res = mysqli_query($conn, $storeName_query);
    $uniqueStoreName = mysqli_num_rows($storeName_res);

    $email_query = "SELECT * FROM `admin` WHERE email = '$email'";
    $email_res = mysqli_query($conn, $email_query);
    $uniqueEmail = mysqli_num_rows($email_res);

    if(empty($_POST["storeName"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmPass"]) || empty($_POST["address"]) || empty($_POST["city"]) || empty($_POST["zip"])){
        $_SESSION['inputError'] = "All inputs must be filled !";
        header('location: signup.php');
        exit();
    }else if($uniqueStoreName != 0){
        $_SESSION['inputError'] = "Email Already exists.";
        header('location: login.php');
        exit();
    }else if(!preg_match('/^[a-zA-Z\s]+$/', $storeName)){
        $_SESSION['inputError'] = "Store name is Not valid. Store name must be letters only.";
        header('location: signup.php');
        exit();
    }else if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)){
        $_SESSION['inputError'] = "First name is Not valid. Store name must be letters only.";
        header('location: signup.php');
        exit();
    }else if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
        $_SESSION['inputError'] = "Last name is Not valid. Last name must be letters only.";
        header('location: signup.php');
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['inputError'] = "Email is Not valid. Please enter a valid email.";
        header('location: signup.php');
        exit();
    }else if($uniqueEmail != 0){
        $_SESSION['inputError'] = "Email Already exists.";
        header('location: login.php');
        exit();
    }else if($password != $confirmPassword){
        $_SESSION['inputError'] = "Password does not match.";
        header('location: signup.php');
        exit();
    }else{
        $query = "INSERT INTO `admin`(`last_name`, `first_name`, `email`, `user_password`, `address`, `city`, `zip`, `storeName`) 
        VALUES ('$lastName','$firstName', '$email', '$password', '$address', '$city', '$zip', '$storeName')";
        $res = mysqli_query($conn, $query);
    }

    header("location: login.php");

}

function login(){

    global $conn;

    $userEmail = validateInputs($_POST["userEmail"]);
    $password = validateInputs($_POST["password"]);
    $pass_query = "SELECT user_password FROM `admin` WHERE email = '$userEmail'";
    $pass_req = mysqli_query($conn, $pass_query);
    $reg_pass = mysqli_num_rows($pass_req);
    
    

    if($reg_pass == 0){
        $_SESSION["Incorrect"] = "Invalid user info please try again";
        header("location: login.php");
    }else{
        $pass_query = "SELECT user_password FROM `admin` WHERE user_password = '$password'";
        $pass_req = mysqli_query($conn, $pass_query);
        $reg_pass = mysqli_num_rows($pass_req);
        if($reg_pass == 0){
            $_SESSION["Incorrect"] = "Wrong Password info please try again";
            header("location: login.php");
        }else{
            $userinfo_query = "SELECT * FROM `admin` WHERE email = '$userEmail' AND user_password = '$password'";
            $res = mysqli_query($conn, $userinfo_query);
            $data = mysqli_fetch_assoc($res);
            $_SESSION["userId"] = $data["id"];
            $_SESSION["userImg"] = $data["img"];
            $_SESSION["lastName"] = $data["last_name"];
            $_SESSION["firstName"] = $data["first_name"];
            $_SESSION["userEmail"] = $data["email"];
            $_SESSION["useraddress"] = $data["address"];
            $_SESSION["userCity"] = $data["city"];
            $_SESSION["userZip"] = $data["zip"];
            $_SESSION["user"] = $data["storeName"];
            header("location: dashboard.php");
        }

       
    }
    }



    

function lastAdded(){
    global $conn;

    $logger = $_SESSION["userId"];
    $last_added_query = "SELECT instruments.*,categories.name AS instrumentCategory FROM `instruments` 
    INNER JOIN categories ON categories.id = instruments.category WHERE id_admin = '$logger' ORDER BY created_date DESC LIMIT 4";
    $res = mysqli_query($conn, $last_added_query);
    $instruments = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $instruments;
}

function addInstrument(){
    global $conn;

    $instrumentName = validateInputs($_POST["instrumentName"]);
    $instrumentCategory = validateInputs($_POST["category"]);
    $instrumentBrand = validateInputs($_POST["instrumentBrand"]);
    $instrumentPrice = validateInputs($_POST["instrumentPrice"]);
    $instrumentQuantity = validateInputs($_POST["instrumentQuantity"]);
    $instrumentDescription = validateInputs($_POST["instrumentDescription"]);
    $instrumentSeller = $_SESSION['userId'];
    $instrumentImg = $_FILES["instrumentImg"];
    $instrumentImg_dir = '';
    if($instrumentImg && $instrumentImg["tmp_name"]){
        $instrumentImg_dir = 'assets/'.generateName(10).'/'.$instrumentImg['name'];
        mkdir(dirname($instrumentImg_dir));
        move_uploaded_file($instrumentImg["tmp_name"], $instrumentImg_dir);
    }else {
        $instrumentImg_dir = 'assets/default-img.png';
    }

    if(empty($_POST["instrumentName"]) || empty($_POST["category"]) || empty($_POST["instrumentBrand"]) || empty($_POST["instrumentPrice"]) || empty($_POST["instrumentQuantity"]) || empty($_POST["instrumentDescription"])){
        $_SESSION["errorAdding"] = "Product can't be added. All inputs must be filled";
        header("location: dashboard.php");
        exit();
    }

    $adding_query = "INSERT INTO `instruments`(`instrument_name`, `instrument_img`, `brand`, `category`, `id_admin`, `price`, `quantity`, `description`)
                         VALUES ('$instrumentName','$instrumentImg_dir', '$instrumentBrand', '$instrumentCategory','$instrumentSeller', '$instrumentPrice', '$instrumentQuantity', '$instrumentDescription')";
    $res = mysqli_query($conn, $adding_query);
    header("location: dashboard.php");
}

function updateInstrument(){
    GLOBAL $conn;
    $instrumentId = $_POST["instrumentId"];

    $instrumentName = validateInputs($_POST["instrumentName"]);
    $instrumentCategory = validateInputs($_POST["category"]);
    $instrumentBrand = validateInputs($_POST["instrumentBrand"]);
    $instrumentPrice = validateInputs($_POST["instrumentPrice"]);
    $instrumentQuantity = validateInputs($_POST["instrumentQuantity"]);
    $instrumentDescription = validateInputs($_POST["instrumentDescription"]);

    $instrumentImg = $_FILES["instrumentImg"];
    $instrumentImg_dir = '';

    if(!empty($instrumentImg["name"])){
        $img_query = "SELECT instrument_img FROM instruments WHERE id = '$instrumentId'";
        $res = mysqli_query($conn, $img_query);
        $img = mysqli_fetch_row($res);
        unlink($img[0]);
        $instrumentImg_dir = 'assets/'.generateName(10).'/'.$instrumentImg['name'];
        mkdir(dirname($instrumentImg_dir));
        move_uploaded_file($instrumentImg["tmp_name"], $instrumentImg_dir);
        $sql="UPDATE `instruments` SET `instrument_name`='$instrumentName',`instrument_img`='$instrumentImg_dir',`brand`='$instrumentBrand',`category`='$instrumentCategory',`price`='$instrumentPrice',`quantity`='$instrumentQuantity',`description`='$instrumentDescription' WHERE id='$instrumentId'";
    }else{
        $sql="UPDATE `instruments` SET `instrument_name`='$instrumentName',`brand`='$instrumentBrand',`category`='$instrumentCategory',`price`='$instrumentPrice',`quantity`='$instrumentQuantity',`description`='$instrumentDescription' WHERE id='$instrumentId'";
    }


    $res = mysqli_query($conn, $sql);
    header("location: products.php");
}
function deleteInstrument(){
    global $conn;
    $id=$_POST["instrumentId"];
    $sql="DELETE FROM `instruments` WHERE id=$id";
    mysqli_query($conn,$sql);
    header("location: dashboard.php");
}

function generateName($n){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $name = '';
    for($i=0; $i<$n; $i++){
        $char_at_index = rand(0, strlen($char) - 1);
        $name .= $char_at_index;
    }
    return $name;
}

function getProducts(){
    global $conn;
    $userId=$_SESSION['userId'];
    $last_added_query = "SELECT instruments.*, categories.name AS instrumentCategory FROM `instruments`
    INNER JOIN categories ON categories.id = instruments.category  WHERE id_admin = $userId";
    $res = mysqli_query($conn, $last_added_query);
    $instruments = mysqli_fetch_all($res,MYSQLI_ASSOC);
    return $instruments;
}

function totalProducts(){

    global $conn;
    $userId=$_SESSION['userId'];
    $prod_query = "SELECT * FROM instruments WHERE id_admin = '$userId'";
    $res = mysqli_query($conn, $prod_query);
    $totalProds = mysqli_num_rows($res);
    return $totalProds;
}

function stockValue(){
    global $conn;
    $userId=$_SESSION['userId'];
    $stock_value_query = "SELECT price, quantity FROM instruments WHERE id_admin = '$userId'";
    $res = mysqli_query($conn, $stock_value_query);
    $stock_value_arr = mysqli_fetch_all($res,MYSQLI_ASSOC);
    $stock_val = 0;
    foreach($stock_value_arr as $product){
        $stock_val += $product["price"] * $product["quantity"];
    }
    return $stock_val;
}

function expensiveProd(){

    global $conn;
    $userId=$_SESSION['userId'];
    $expensive_query = "SELECT max(price) FROM instruments WHERE id_admin = '$userId'";
    $res = mysqli_query($conn, $expensive_query);
    $expensive_product = mysqli_fetch_row($res);
    return $expensive_product;
}

function cheapestProd(){

    global $conn;
    $userId=$_SESSION['userId'];
    $cheap_query = "SELECT min(price) FROM instruments WHERE id_admin = '$userId'";
    $res = mysqli_query($conn, $cheap_query);
    $cheapest_product = mysqli_fetch_row($res);
    return $cheapest_product;
}

?>