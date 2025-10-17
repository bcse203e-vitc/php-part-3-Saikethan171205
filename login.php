<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['user'] === "admin" && $_POST['pass'] === "1234") {
        $_SESSION['user'] = "admin";
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="post" action="login.php">
    Username: <input type="text" name="user" required><br><br>
    Password: <input type="password" name="pass" required><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>

