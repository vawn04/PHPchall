<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding-top: 100px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>

    <?php

    $valid_accounts = array(
        'admin' => '123123',
        'user' => '123456'
    );
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if (array_key_exists($username, $valid_accounts) && $valid_accounts[$username] == $password) {
            echo "<p>Welcome, $username!</p>";
        } else {
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    }
    ?>
</body>
</html>
