<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá ký tự không phải số</title>
</head>
<body>
    <h2>Xoá ký tự không phải số trong chuỗi</h2>
    <form action="" method="POST">
        <input type="text" id="input" name="input" require>
        <input type="submit">
    </form>
<?php
    if (isset($_POST['input'])){
        $chuoi = $_POST['input'];
        $chuoi_sau_khi_xoa = preg_replace('/[^0-9.,]/', '', $chuoi);
        echo "Chuỗi sau khi xóa:  $chuoi_sau_khi_xoa";

    }
?>
</body>
</html>