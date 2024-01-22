Code
```
<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>

<h1>Calculator Basic</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    a: <input type="text" name="number1"><br>
    b: <input type="text" name="number2"><br>
    <input type="submit" value="Calculate">
</form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $number1 = $_POST["number1"];
        $number2 = $_POST["number2"];

        if (!empty($number1) && !empty($number2)) {
            // Thực hiện các phép toán
            $sum = $number1 + $number2;
            $difference = $number1 - $number2;
            $product = $number1 * $number2;

            if ($number2 != 0) {
                $quotient = $number1 / $number2;
            } else {
                $quotient = "Không thể chia cho 0";
            }

            echo "<p>Addition: $sum</p>";
            echo "<p>Subtraction: $difference</p>";
            echo "<p>Multiplication: $product</p>";
            echo "<p>Division: $quotient</p>";
        } else {
            echo "<p>Vui lòng nhập cả hai số</p>";
        }
    }
?>

</body>
</html>
```
Image

![lab1_b](https://github.com/vawn04/PHPchall/assets/154768853/91771fd8-66a0-4182-9e44-98a7f624212d)
