<?php
include "connection.php";

if (isset($_POST['import'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['size'] > 0) {
        $open = fopen($file, "r");

        fgetcsv($open); // skip header row

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
            $name = $data[0];
            $price = $data[1];
            $qty = $data[2];

            if (!empty($name) && is_numeric($price) && is_numeric($qty)) {
                mysqli_query($conn, "INSERT INTO products (name, price, quantity) VALUES ('$name', '$price', '$qty')");
            }
        }

        fclose($open);
        echo "<script>alert('✅ Data imported successfully!'); window.location.href='view.php';</script>";
    } else {
        echo "<script>alert('❌ Please select a CSV file'); window.location.href='view.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Import</title>
  </head>
  <body>
    <h2 class="text-center text-secondary mt-3">Import from Excel</h2>
    <div class="container">
       <div class="row col-6 mx-auto">
             <form action="import.php" method="post" enctype="multipart/form-data" class="mt-3">
                <input type="file" name="csv_file" accept=".csv" required class="form-control mt-4">
                <button type="submit" name="import" class="btn btn-primary mt-3">Import</button>
                <a href="view.php" class="btn btn-outline-primary mt-3"><--Back</a>
            </form>
       </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>





