<?php
include("connection.php");

$search = $_POST['query'];

$result = mysqli_query($con, "SELECT * FROM products WHERE name LIKE '%$search%'");

if (mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)) {
        echo "<tr class='text-center'>
                <td>{$data['id']}</td>
                <td>{$data['Name']}</td>
                <td>{$data['Price']}</td>
                <td>{$data['Quantity']}</td>
                <td>
                    <button class='btn btn-outline-primary'>Edit</button>
                </td>
                <td>
                    <button class='btn btn-danger'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center text-danger'>No products found</td></tr>";
}
?>
