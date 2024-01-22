```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ax+b=0</title>
</head>
<body>

<h2>Phương Trình Bậc Nhất ax+b=0</h2>

<form method="post" action="">
    <label for="a"></label>
    <input type="text" name="a" id="a" required>

    <label for="b">x +</label>
    <input type="text" name="b" id="b" required> = 0
    <br>
    <br>

    <input type="submit" name="calculate" value="Calculate">
</form>

<?php
if (isset($_POST['calculate'])) {

    $a = $_POST['a'];
    $b = $_POST['b'];

    if (is_numeric($a) && is_numeric($b)) {
        if ($a != 0) {
            $result = -$b / $a;
            echo "<p>Phương trình có nghiệm là x = $result</p>";
        } else {
            if ($b == 0) {
                $result = "Vô số nghiệm";
            } else {
                $result = "Phương trình vô nghiệm";
            }
            echo "<p>Kết quả: $result</p>";
        }
    } else {
        echo "<p>Nhập số.</p>";
    }
}
?>

</body>
</html>
```
![Screenshot 2024-01-21 180830](https://github.com/vawn04/PHPchall/assets/154768853/fb4559b4-f18b-458f-ae40-cea25ba9fc65)
