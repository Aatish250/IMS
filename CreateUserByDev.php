<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="POST">
        <caption>Create users</caption>
        <br>
        Username: <input type="text" name="username"> <br>
        Password: <input type="password" name="password"> <br>
        User: <select name="role">
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select> <br>
        <input type="submit" name="signup" value="Sign up">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
        function begin($row)
        {
            return "role: " . $row['role'] . " username: " . $row['username'];
        }
        require 'dbConn.php';
        // $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `role`='".$_POST['role']."' and `username`='".$_POST['username']."' and `password`='".$_POST['password']."'");
        // while($row = mysqli_fetch_assoc($result)){
        //     echo ($row > 0)? begin($row) : "No account found";
        // }
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // $hashVerify = (password_verify($password, $hashedPassword))?"True":"false";
        echo $hashedPassword;

        $result = mysqli_query($conn, "insert into `users`(`role`, `username`, `password`) values('$role', '$username', '$hashedPassword')");
        if ($result)
            echo "<br><h1>Success<?h1>";
        else
            echo "Error";
    }
    ?>
</body>

</html>