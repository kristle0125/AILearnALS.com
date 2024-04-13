<?php
session_start();
include '../db.php'; // Adjust the path as necessary

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: /AILEARN/index.php');
    exit;
}

if (isset($_POST['uploadBtn']) && isset($_FILES['profilePic'])) {
    $img_name = $_FILES['profilePic']['name'];
    $img_size = $_FILES['profilePic']['size'];
    $tmp_name = $_FILES['profilePic']['tmp_name'];
    $error = $_FILES['profilePic']['error'];

    if ($error === 0) {
        if ($img_size > 1000000) { // Check file size (1MB here)
            echo "Sorry, your file is too large.";
            exit;
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Update database
                $userId = $_SESSION['id'];
                $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $img_upload_path, $userId);
                if ($stmt->execute()) {
                    header("Location: index.php"); // Redirect back and show the new image
                } else {
                    echo "Failed to update profile picture!";
                }
            } else {
                echo "You can't upload files of this type";
            }
        }
    } else {
        echo "Unknown error occurred!";
    }
} else {
    echo "Error: Invalid request";
}
?>
