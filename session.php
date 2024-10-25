<?php

if (isset($_POST['log-out']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    session_unset();
    session_destroy();
    header('location: ../../');
}
