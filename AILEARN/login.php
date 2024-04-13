<?php
session_start(); // Start the session.

include 'db.php'; // Include your database connection.

// Function to sanitize data.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if the form is submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Sanitize and assign input data to variables
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    // Query the database for the user including the user_type.
    $sql = "SELECT id, name, email, password, user_type FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . htmlspecialchars($conn->error);
        exit;
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password.
        if (password_verify($password, $user['password'])) {
            // Password is correct, so start a new session.
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_type'] = $user['user_type']; // Save the user type in the session.

            // Redirect to the correct page based on user type.
            if ($_SESSION['user_type'] == 'admin') {
                header('Location: /AILEARN/AP/index.php');
            } else {
                header('Location: /AILEARN/LP/index.php');
            }
            exit;
        } else {
            // If password doesn't match.
            header('Location: index.php?login_error=password');
            exit;
        }
    } else {
        // If user doesn't exist.
        header('Location: index.php?login_error=user_not_found');
        exit;
    }
} else {
    // Not a POST request or missing email/password.
    header('Location: index.php?login_error=invalid_request');
    exit;
}
?>
