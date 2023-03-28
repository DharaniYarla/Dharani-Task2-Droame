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

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // validate form input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number)) {
        echo "Please fill out all fields.";
    } else {
        // insert customer into database
        $sql = "INSERT INTO customers (first_name, last_name, email, phone_number) VALUES ('$first_name', '$last_name', '$email', '$phone_number')";

        if (mysqli_query($conn, $sql)) {
            echo "Customer created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!-- HTML form for adding a customer -->
<form method="post">
  <label for="first_name">First Name:</label>
  <input type="text" id="first_name" name="first_name" required>

  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="phone_number">Phone Number:</label>
  <input type="tel" id="phone_number" name="phone_number" required>

  <button type="submit">Add Customer</button>
</form>

<?php
mysqli_close($conn);
?>
