<?php
$conn = new mysqli("localhost", "root", "", "dulieusinhvien");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $sql = "INSERT INTO students (id, name, mobile, email) VALUES ('$id', '$name', '$mobile', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: lab6.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
    </style>
</head>
<body>
<h2>Thêm sinh viên mới</h2>
<form action="them.php" method="POST">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required>
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" required>
    <label for="mobile">Số điện thoại:</label>
    <input type="text" id="mobile" name="mobile" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <input type="submit" value="Thêm sinh viên">
</form>
</body>
</html>
