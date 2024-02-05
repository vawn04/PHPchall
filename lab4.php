<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload an Image</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Upload an Image</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <input type="file" name="file" id="file" required><br>
        <input type="submit" name="submit" value="Upload File">
    </form>
</body>
</html>

<?php
$uploadDir = "uploads/";

if (isset($_POST['submit'])) {
    $uploadedFile = $uploadDir . basename($_FILES["file"]["name"]);
    $uploadOk = true;

    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    $fileExtension = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Only allow uploading files with .jpg, .jpeg, .png, or .gif extensions.";
        $uploadOk = false;
    }

    if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
        echo "An error occurred while uploading the file.";
        $uploadOk = false;
    }

    if (file_exists($uploadedFile)) {
        echo "File already exists.";
        $uploadOk = false;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadedFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "An error occurred while uploading the file.";
        }
    }

    if (!empty($uploadedFile) && file_exists($uploadedFile)) {
        echo "<br>";
        echo "<img src=\"$uploadedFile\">";
    }
}
?>
