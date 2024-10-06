<?php

if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['role'] = $_POST['role'];



    $sql = "SELECT * FROM users WHERE username = '$username' AND role = '$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            if ($role == "admin") {
                header('Location: Admin/Dashboard/dashboard.php');
            } else if ($role = "staff") {
                header('Location: Staff/Inventory/inventory.php');
            } else {
                $message = "Welcome to the staff.php";
                echo "<script>flashMessage('$message');</script>";
            }
        } else {
            $message = "Invalid password";
            echo "<script>flashMessage('$message');</script>";
        }
    } else {
        $message = "Invalid username or password";
    }
}


if (isset($_POST['log-out']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    session_unset();
    session_destroy();
    echo "Called";
    header('location: ../../index.php');
}
