<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            margin-top: 20px;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Danh sách sinh viên</h2>
    <button onclick="window.location.href='them.php'">Thêm sinh viên</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>View detail</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
            $conn = new mysqli("localhost", "root", "", "dulieusinhvien");

            $sql = "SELECT id, name, mobile, email FROM students";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["mobile"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><a href='detail.php?id=" . $row["id"] . "'>View detail</a></td>";
                    echo "<td><a href='sua.php?id=" . $row["id"] . "'>Sửa</a></td>";
                    echo "<td><a href='xoa.php?id=" . $row["id"] . "'>Xóa</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Không có sinh viên nào trong cơ sở dữ liệu.</td></tr>";
            }
        ?>
    </table>
</div>

</body>
</html>
