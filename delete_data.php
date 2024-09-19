<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37101884";
$password = "260304trung";
$dbname = "if0_37101884_b5_mydb";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("DELETE FROM MyGuests WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Delete record
    $id = 3;
    $stmt->execute();

    echo "Record deleted successfully";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

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
    <form action="display_data.php">
        <input type="submit" value="Hiển Thị">
    </form>
</body>
</html>
