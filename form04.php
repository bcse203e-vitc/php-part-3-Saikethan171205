<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_captcha = $_POST['captcha_input'] ?? '';

    if ($user_captcha == $_SESSION['captcha']) {
        $message = "CAPTCHA verification successful!";
    } else {
        $message = "CAPTCHA verification failed. Try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple CAPTCHA Verification</title>
</head>
<body>

<h2>CAPTCHA Verification Form</h2>

<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form method="post" action="form04.php">
    <p>
        <img src="captch04.php" alt="CAPTCHA Image"><br><br>
        Enter the number shown above: <input type="text" name="captcha_input" required>
    </p>
    <input type="submit" value="Verify">
</form>

</body>
</html>

