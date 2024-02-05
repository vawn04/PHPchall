<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm ngược đến sinh nhật</title>
</head>
<body>
    <h2>Đếm ngược đến sinh nhật tiếp theo</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="ngay_sinh">Nhập ngày sinh của bạn:</label><br>
        <input type="date" id="ngay_sinh" name="ngay_sinh"><br><br>
        <input type="submit" value="Tính ngày">
    </form>
    <br>
    <?php

    if (isset($_POST['ngay_sinh'])) {
        $ngay_sinh = $_POST['ngay_sinh'];
        if (!empty($ngay_sinh)) {
            $ngay_hien_tai = new DateTime();
            $sinh_nhat = new DateTime($ngay_sinh);
            $sinh_nhat->modify('+' . $ngay_hien_tai->format('Y') - $sinh_nhat->format('Y') . ' years');
            if ($ngay_hien_tai > $sinh_nhat) {
                $sinh_nhat->modify('+1 year');
            }
            $so_ngay = $ngay_hien_tai->diff($sinh_nhat)->days;

            echo "Còn " . $so_ngay . " ngày nữa là đến sinh nhật bạn";
        } else {
            echo "Vui lòng nhập ngày sinh của bạn!";
        }
    }
    ?>
</body>
</html>
