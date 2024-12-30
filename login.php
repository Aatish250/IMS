<?php

include 'dbConn.php';
session_start(); // Start the session at the beginning

// Initialize message variable
$message = "";

// ------ Login logic ----------
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === "admin") {
                header('Location: Admin/Dashboard/dashboard.php');
                exit();
            } elseif ($role === "staff") {
                header('Location: Staff/Inventory/inventory.php');
                exit();
            }
        } else {
            // Only set this message if the user exists but password is incorrect
            $message = "Invalid password";
        }
    } else {
        // This message indicates that either the username or role is incorrect
        $message = "Invalid username or role";
    }
}

// -- Check if session is complete or not
if (isset($_SESSION['username']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: Admin/Dashboard/dashboard.php");
        exit();
    } elseif ($_SESSION['role'] === 'staff') {
        header("Location: Staff/Inventory/inventory.php");
        exit();
    }
}

?>
