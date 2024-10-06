<?php
session_start();
if ($_SESSION['role'] !== 'staff') {
    header('location: ../../index.php');
    exit();
}
