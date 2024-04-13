<?php
include 'db.php'; // Include the database connection

// Function to sanitize data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign input data to variables
    $user_type = test_input($_POST['user_type']);
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);

    // Validate password
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL to prevent SQL injection
    $sql = "INSERT INTO users (user_type, name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $user_type, $name, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Redirect to index.php with a query parameter indicating successful account creation
        header('Location: index.php?account_created=true');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Not a POST request, redirect or display an error
    echo "Invalid request.";
}
?>
