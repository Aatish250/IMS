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
    $stmt = $conn->prepare("SELECT * FROM staffs WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if staff exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            
            if ($role === "admin") {
                header('Location: Admin/Dashboard');
                $message = "Admin login successful";
            } elseif ($role === "staff") {
                header('Location: Staff/Inventory');
                $message = "Staff login successful";
            }   
            exit();
        } else {
            $message = "Invalid password";
        }
    } else {
        $message = "Invalid username or role";
       
    }
}

// -- Check if session is complete or not
if (isset($_SESSION['username']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: Admin/Dashboard/");
        exit();
    } elseif ($_SESSION['role'] === 'staff') {
        header("Location: Staff/Inventory/");
        exit();
    }
}

?>
