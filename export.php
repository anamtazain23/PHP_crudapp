<?php
include "connection.php";

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="products.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['id','Name', 'Price', 'Quantity']); // Header row

$result = mysqli_query($conn, "SELECT * FROM products");

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
