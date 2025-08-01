<?php
include "connection.php";

//Validation

session_start();

$name = trim($_POST['p_name'] ?? '');
$price = $_POST['p_price'] ?? '';
$qty = $_POST['p_qty'] ?? '';
$errors = [];

if ($name === '') {
    $errors['name'] = 'Product name is required.';
}
if (!is_numeric($price) || $price < 0) {
    $errors['price'] = 'Price must be a positive number.';
}
if (!is_numeric($qty) || $qty < 0) {
    $errors['qty'] = 'Quantity must be a positive number.';
}

if ($errors) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = ['name' => $name, 'price' => $price, 'qty' => $qty];
    header("Location: add.php");
    exit;
}




//Add Product 

if(isset($_POST['add_product'])){

    $pname = $_POST['p_name'];
    $pprice = $_POST['p_price'];
    $pqty = $_POST['p_qty'];

    //Create Query
    $query = mysqli_query( $con,"INSERT INTO products( Name,	Price,	Quantity )VALUES('$pname','$pprice', '$pqty')");
    if($query){
        echo "<script>
         alert('Product Added');
         location.assign('view.php');
         </script>";
    }else{
        echo "<script>
         alert('Fill all the fields first');
         location.assign('add.php');
         </script>";
    }
}

// Update
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $qty = $_POST['p_qty'];

    //Update query
    $query= mysqli_query($con, "UPDATE products SET Name = '$name' , Price = '$price', Quantity = '$qty' WHERE id = '$id'");

    if($query){
        echo "<script>
         alert('Data Updated Successfully');
         location.assign('view.php');
         </script>";
    }
}

//Delete
if(isset($_POST['delete'])){
    $id = $_POST['id'];

    //Delete Query
    $query = mysqli_query($con, "DELETE FROM products WHERE id = '$id'");
    if($query){
        echo "<script>
            alert('Data Deleted Successfully');
            location.assign('view.php')
        </script>";
    }
}

?>
