<?php

include 'dbConn.php';
$message = "";

// ------ login logics in this php ----------
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // --- set session value ---


    $sql = "SELECT * FROM users WHERE username = '$username' AND role = '$role'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $_POST['username'];
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['password'] = $_POST['password'];

            if ($role == "admin") {
                $_SESSION['role'] = $_POST['role'];
                header('Location: Admin/Dashboard/dashboard.php');
            }
            if ($role = "staff") {
                $_SESSION['role'] = $_POST['role'];
                header('Location: Staff/Inventory/inventory.php');
            }
        } else {
            $message = "Invalid password";
        }
    } else {
        $message = "Invalid username";
    }
    header($_SERVER['HTTP_REFERER']);
}

// -- check if session is complete or not
if (isset($_SESSION['username']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] == 'admin') {
        $message = "GO TO ADMIN";
        header("location: Admin/Dashboard/dashboard.php");
        // echo "GO TO ADMIN";
    }
    if ($_SESSION['role'] == 'staff') {
        $message = "GO TO STAFF";
        // echo "GO TO STAFF";
        header("Location: Staff/Inventory/inventory.php");
    }

}


?>