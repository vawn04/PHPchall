```
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Factorial</title>
</head>
<body>
	<h2>Factorial</h2>

<form method="post" action="">
        <label for="n">Enter n =</label>
        <input type="text" name="number" />
        <input type="submit" value="Calculator" />
    </form>
    
   <?php
  	$n = intval($_POST["number"]);
  	if ($n < 0) {
        	return "Khong the tinh giai thua cho so am";
	} elseif ($n == 0 || $n == 1) {
		return 1;
	} else {
		$giaithua = 1;
		for ($i = 2; $i <= $n; $i++) {
			$giaithua *= $i;
		}
		echo "giai thua 1 ->5 la: $giaithua";
	}
		
?>
</body>
</html>
```
![Screenshot 2024-01-27 145334](https://github.com/vawn04/PHPchall/assets/154768853/402b42d2-21f9-4e0d-84e9-172a64d83812)
