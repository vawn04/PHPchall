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
