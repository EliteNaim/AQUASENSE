<?php
// Database connection details
$servername = "localhost"; // Replace with your MySQL server details
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "Aquasense";     // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO users (name, mobile, password, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $mobile, $hashed_password, $gender); // 'ssss' indicates four string parameters

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to login page after successful registration
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
