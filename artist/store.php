<?php
session_start();
include('../includes/config.php');
var_dump($_POST);
$_SESSION['cost'] =$cost = trim($_POST['cost_price']);
$_SESSION['sell'] =$sell = trim($_POST['sell_price']);
$_SESSION['desc'] =$desc =  trim($_POST['description']);
$_SESSION['qty'] = $quantity = trim($_POST['quantity']);
if(empty($_POST['description'])  ) {
    $_SESSION ['descerror'] = 'Please describe your product';
    header("Location: create.php");
    exit();
}

if (empty($_POST['cost_price'])){
$_SESSION['costerror'] = 'Please state the price of the item';
    header("Location: create.php");
    exit();
}

if(isset($_FILES['img_path'])){
    if ($_FILES['img_path']['type'] == "image/jpeg" || $_FILES['img_path']['type'] == "image/jpg" || $_FILES['img_path']['type'] == "image/png"){
        $source = $_FILES ['img_path'] ['tmp_name'];
        $target = 'media/' . $_FILES ['img_path'] ['name'];
        move_uploaded_file($source, $target) or die("couldn't upload");
    }
    else{
        $_SESSION['imgError'] = "Wrong Image Type";
        header("Location: create.php");
        exit();
    }
}


$sql = "INSERT INTO item (cost_price, sell_price, description, quantity, img_path) VALUES ('$cost', '$sell', '$desc', '$quantity', '$target')";
    if (mysqli_query($conn, $sql)){
        echo "Insert Successful";
    }
    else {
        echo "Error" . $sql . mysqli_error($conn);
    }

$query_stock = "INSERT INTO stock (item_id, quantity) VALUES (LAST_INSERT_ID(), '$quantity')";
if (mysqli_query($conn, $query_stock)){
    echo "Image Insert Success";
} else {
    echo "Error" . $query_stock . mysqli_error($conn);
}
    mysqli_close($conn);
?>