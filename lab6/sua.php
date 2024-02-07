<?php
$conn = new mysqli("localhost", "root", "", "dulieusinhvien");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $new_id = $_POST['new_id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $sql = "UPDATE students SET id=?, name=?, mobile=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $new_id, $name, $mobile, $email, $student_id);
    
    if ($stmt->execute()) {
        header("Location: lab6.php");
        exit();
    }
    $stmt->close();
}

$id_to_edit = $_GET['id'];
$sql_select = "SELECT * FROM students WHERE id='$id_to_edit'";
$result = $conn->query($sql_select);
$row = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
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
<h2>Sửa thông tin sinh viên</h2>
<form action="sua.php" method="POST">
    <label for="new_id">ID Sinh viên:</label>
    <input type="text" id="new_id" name="new_id" value="<?php echo $row['id']; ?>" required>
    <label for="name">Tên:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
    <label for="mobile">Số điện thoại:</label>
    <input type="text" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
    <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
    <input type="submit" value="Lưu thông tin">
</form>
</body>
</html>
