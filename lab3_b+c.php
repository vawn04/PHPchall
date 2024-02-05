<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Forms</title>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f0f0f0;
        color: #333;
    }

    .forms-container {
        display: flex;
        justify-content: space-around;
        max-width: 900px;
        font-weight: normal;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    select {
        margin-left: 20px;
        padding: 8px;
        width: 120px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-section {
        width: 50%;
    }

    label {
        font-size: 18px;
        margin-left: 20px;
        display: block;
        margin-bottom: 10px;
        color: #555;
    }

    input[type="text"],
    input[type="password"] {
        width: 80%;
        padding: 8px;
        margin-left: 20px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .checkbox-group {
        margin-left: 20px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    button {
        margin: auto;
        padding: 10px 20px;
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-row {
        display: inline-block;
    }

    h3 {
        margin-left: 20px;
        color: #333;
    }

    p {
        margin-left: 5%;
        color: #888;
        font-size: 14px;
        margin-bottom: 5px;
    }

    #input1 {
        margin-left: 20px;
        width: 85%;
    }
</style>


</head>
<body>
<div class="forms-container">
        <div class="form-section">
            <h2>Login</h2>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="username">Username:</label>
                <input type="text" name="username" id="login-username" pattern ="[A-Za-z0-9]+" title = "Sai định dạng" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="login-password" required>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me" name = "remember-me" id = "btn">Remember Me</label>
                </div>

                <button type="submit" name="login">Log in</button>
            </form>
        </div>

        <div class="form-section">
            <h2>Signup for new Account</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="register-username">User Name</label>
            <input type="text" name="register-username" id="register-username" pattern="[A-Za-z0-9]+" title="Sai định dạng" required>

            <label for="register-email">User Email *</label>
            <input type="text" name="register-email" id="register-email" required>

            <label for="register-password">Password</label>
            <input type="password" name="register-password" id="register-password" required>

            <label for="register-cfpassword">Confirm Password</label>
            <input type="password" name="register-cfpassword" id="register-cfpassword" required>

            <div class="form-row">
                <label for="cars">Select Title</label>
                <select name="cars" id="cars">
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                </select>
            </div>

            <div class="form-row">
                <label id="input1" forms-containeror="register-name">Full Name *</label>
                <input id="input1" type="text" name="register-name" id="register-username" pattern="[a-zA-Z]+.{2,}" title="Tối thiểu 2 kí tự và tiếng việt không dấu." required>
            </div>

            <h3>Company Detail</h3>

            <p>Provide detail about your company</p>

            <label for="register-companyname">Company Name</label>
            <input type="text" name="register-companyname" id="register-companyname" pattern="[A-Za-z0-9]+" title="Sai định dạng" required>

            <div class="checkbox-group">
                <input type="checkbox" id="confirm" name="confirm" required>
                <label for="confirm" id="btn">I am agree with registration</label>
            </div>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>
<?php
session_start(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "lucaszf";
    $password = "123456";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Xử lý đăng nhập
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                // Kiểm tra xem User đã chọn "Remember Me" chưa
                if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
                    // Lưu thông tin User vào cookie
                    $cookie_name = "user";
                    $cookie_value = $_POST['username'];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // Cookie sẽ tồn tại trong 30 ngày
                }
            } else {
                echo "Sai tên đăng nhập hoặc mật khẩu";
            }
        } else {
            echo "Sai tên đăng nhập hoặc mật khẩu";
        }
        $stmt->close();
    }

    // Xử lý đăng ký
    if (isset($_POST['register'])) {
        $registerUsername = $_POST['register-username'];
        $registerEmail = $_POST['register-email'];
        $registerPassword = password_hash($_POST['register-password'], PASSWORD_DEFAULT);
        $registerName = $_POST['register-name'];
        $registerCompanyName = $_POST['register-companyname'];

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, name, company_name) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $registerUsername, $registerEmail, $registerPassword, $registerName, $registerCompanyName);

        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
        } else {
            echo "Lỗi: " . $stmt->error;
        }
        $stmt->close();
    }

    $conn->close();
}
?>
</body>
</html>
