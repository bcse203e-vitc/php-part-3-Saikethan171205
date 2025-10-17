<?php
$message = "";
$imagePath = "";

if (isset($_FILES['file'])) {
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            $message = "Failed to create upload directory.";
        }
    }
    $fileName = basename($_FILES['file']['name']);
    $targetFile = $uploadDir . $fileName;
    if (empty($message)) {
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $uploadErrors = [
                UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive.",
                UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive.",
                UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
                UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
                UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
                UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload.",
            ];
            $errorCode = $_FILES['file']['error'];
            $errorMsg = $uploadErrors[$errorCode] ?? "Unknown upload error.";
            $message = "Upload failed: " . $errorMsg;
        } else {
            $check = getimagesize($_FILES['file']['tmp_name']);
            if ($check === false) {
                $message = "File is not a valid image.";
            } else {
                // Try to move uploaded file
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                    $message = "File uploaded successfully.";
                    $imagePath = $targetFile;
                } else {
                    $message = "Sorry, there was an error moving the uploaded file.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload and Display Image</title>
</head>
<body>
<h2>Upload Image</h2>
<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>
<form method="post" enctype="multipart/form-data" action="upload05.php">
    Select image to upload:
    <input type="file" name="file" accept="image/*" required>
    <br><br>
    <input type="submit" value="Upload Image">
</form>
<?php if (!empty($imagePath)): ?>
    <h3>Uploaded Image:</h3>
    <img src="<?php echo htmlspecialchars($imagePath); ?>" width="200" alt="Uploaded Image">
<?php endif; ?>
</body>
</html>

