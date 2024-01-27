```
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Min-Max<</title>
</head>
<body>
	<h2>Min-Max</h2>

   <?php
  	$my_array = array('EHC', 'HackYourLimits', 'Training');

	$minLength = PHP_INT_MAX;
	$maxLength = 0;

	$minLength = min(array_map('strlen', $my_array));
	$maxLength = max(array_map('strlen', $my_array));

	echo "minLength = $minLength; maxLength = $maxLength;";		
?>
</body>
</html>
```
![Screenshot 2024-01-27 150544](https://github.com/vawn04/PHPchall/assets/154768853/0f3130bd-eee7-4d81-a073-86e5b2723f4e)
