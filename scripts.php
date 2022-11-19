<?php
include "database.php";

session_start();
if(isset($_POST['signUp']))  signUp();
if(isset($_POST['logIn']))  logIn();
if(isset($_POST['addInstrument']))  addInstrument();
if(isset($_POST['update']))  updateInstrument();
if(isset($_GET['id']))  deleteInstrument();

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

function lastAdded(){
    global $conn;

    $last_added_query = "SELECT * FROM `instruments` ORDER BY created_date DESC LIMIT 4";
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

    $sql="UPDATE `instruments` SET `instrument_name`='$instrumentName',`brand`='$instrumentBrand',`category`='$instrumentCategory',`price`='$instrumentPrice',`quantity`='$instrumentQuantity',`description`='$instrumentDescription' WHERE id='$instrumentId'";
    $res = mysqli_query($conn, $sql);
    header("location: dashboard.php");
}
function deleteInstrument(){
    global $conn;
    $id=$_GET['id'];
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


?>