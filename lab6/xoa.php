<?php
$conn = new mysqli("localhost", "root", "", "dulieusinhvien");

if(isset($_GET['id'])) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $_GET['id']);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $stmt->close();
            header("Location: lab6.php");
            exit();
        }
        $stmt->close();
    }
}
$conn->close();
?>
