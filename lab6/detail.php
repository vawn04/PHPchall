<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $conn = new mysqli("localhost", "root", "", "dulieusinhvien");

        if(isset($_GET['id'])) {
            $student_id = $_GET['id'];
            $sql = "SELECT id, name, mobile, email FROM students WHERE id = ?";
            $stmt = $conn->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param("i", $student_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo "<h2>Thông tin sinh viên</h2>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th></tr>";
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                }
                
                $stmt->close();
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
