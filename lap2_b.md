```
<!DOCTYPE html>
<html>
<head>
    <title>Tính tổng dãy số tự nhiên</title>
</head>
<body>
    <h2>Nhập số nguyên dương n:</h2>

    <form method="post" action="">
        <input type="text" name="number" />
        <input type="submit" value="Tính tổng" />
    </form>

    <?php
  	if ($_SERVER["REQUEST_METHOD"] == "POST") {

    	 if (empty($_POST["number"])) {
        	echo "Vui lòng nhập n.";
   	 } else {
        	// Nhận giá trị n
        $n = intval($_POST["number"]);

        if ($n <= 0) {
            echo "Vui lòng nhập số nguyên dương.";
        } else {

            $sum = 0;
            for ($i = 1; $i <= $n; $i++) {
                $sum += $i;
            }

            echo "Sum = $sum.";
        }
    }
}
?>


</body>
</html>
```

![image](https://github.com/vawn04/PHPchall/assets/154768853/fcdcb4b0-a7ed-42e5-8782-a043b3007874)
