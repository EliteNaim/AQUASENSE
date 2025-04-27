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
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $stmt = $conn->prepare("SELECT password FROM users WHERE mobile = ?");
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    // If user exists, verify the password
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Redirect to the profile page after successful login
            header("Location: index.html");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that mobile number.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
