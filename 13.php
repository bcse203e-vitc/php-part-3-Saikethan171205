<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Student";
}

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $_SESSION['name'] = htmlspecialchars($_GET['name']);
}
echo "Hello, " . $_SESSION['name'] . "! Welcome to the PHP lab.";
?>

