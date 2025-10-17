<?php
session_start();
$valid_username = "user";
$valid_password = "pass123";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + (30 * 24 * 60 * 60));
        } else {
            setcookie('username', '', time() - 3600);
        }
        header("Location: welcome.php");
        exit;
    } else {
        $message = "Invalid username or password.";
    }
}
$saved_username = $_COOKIE['username'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login with Remember Me</title>
</head>
<body>
<h2>Login</h2>
<?php if ($message): ?>
<p style="color:red;"><?php echo $message; ?></p>
<?php endif; ?>

<form method="post" action="login.php">
    Username: <input type="text" name="username" value="<?php echo htmlspecialchars($saved_username); ?>" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <label>
        <input type="checkbox" name="remember" <?php if($saved_username) echo "checked"; ?>> Remember Me
    </label><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>

