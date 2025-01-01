<!-- Setting up al the form action on top of page to make the data changed first then display on html -->
<!-- Going from bottom to top because top section have mreo displays then bottom section -->

<?php // create database connection and check users role
include '../../dbConn.php';
require '../checkAdmin.php';
?>

<?php // to send message as get and refresh previous data
function send_message_as_GET($message)
{
    header("location: index.php?message=$message");
}
?>

<?php // insert new category
if (isset($_POST['addCategory']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    $category = $_POST['category'];
    $sql = "INSERT INTO `category` (`category_id`, `category`) VALUES (NULL, '$category')";
    if (mysqli_query($conn, $sql))
        $message = "$category category added successfully!";
    else
        $message = "Error adding category";
    send_message_as_GET($message);
}
?>

<?php // Createing staff account
if (isset($_POST['add-staff']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    echo "Running here-------------------------------------------------------------------";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "insert into `users`(`role`, `username`, `password`) values('staff', '$username', '$hashedPassword')");
    if ($result)
        $message = "Staff: $username created successfully!";
    else
        $message = "Error creating user";

    send_message_as_GET($message);
}
?>

<?php // to delete category
if (isset($_POST['delete-cid']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    // echo "Deleted: " . $_POST['delete-uid'];

    $delete = mysqli_query($conn, "DELETE FROM category WHERE category_id = " . $_POST['delete-cid']);
    $message = "Deleted Category: " . $_POST['delete-cid'];
    send_message_as_GET($message);
}
?>

<?php // to delete user
if (isset($_POST['delete-uid']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    // echo "Deleted: " . $_POST['delete-uid'];

    $delete = mysqli_query($conn, "DELETE FROM users WHERE uid = " . $_POST['delete-uid']);
    $message = "Deleted User: " . $_POST['delete-uid'];
    send_message_as_GET($message);
}
?>