<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37101884";
$password = "260304trung";
$dbname = "if0_37101884_b5_mydb"; // Kết nối tới CSDL đã được tạo thủ công

try {
    // Kết nối tới cơ sở dữ liệu đã tạo
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL để tạo bảng MyGuests
    $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci";
    
    // Thực thi lệnh
    $conn->exec($sql);
    echo "Table MyGuests created successfully<br>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="main.php">
        <input type="submit" value="quay lại">
    </form>
</body>
</html>
