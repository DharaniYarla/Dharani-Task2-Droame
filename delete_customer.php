<?php
// connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// check if customer ID is set
if (!isset($_GET['id'])) {
    echo "No customer ID specified.";
} else {
    $customer_id = $_GET['id'];

    // delete customer from database
    $sql = "DELETE FROM customers WHERE customer_id = $customer_id";

    if (mysqli_query($conn, $sql)) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
