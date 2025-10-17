<?php
session_start();
$valid_username = "admin";
$valid_password = "1234";
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'] ?? '';
    $password = $_POST['pass'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['user'] = $username;
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + (30 * 24 * 60 * 60)); // 30 days
        } else {
            setcookie('username', '', time() - 3600); // delete cookie
        }
        header("Location: welcome.php");
        exit;
    } else {
        $message = "Invalid credentials.";
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
    <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>
<form method="post" action="login03.php">
    Username: <input type="text" name="user" value="<?php echo htmlspecialchars($saved_username); ?>" required><br><br>
    Password: <input type="password" name="pass" required><br><br>
    <label>
        <input type="checkbox" name="remember" <?php if ($saved_username) echo 'checked'; ?>> Remember Me
    </label><br><br>
    <input type="submit" value="Login">
</form>
</body>
</html>

