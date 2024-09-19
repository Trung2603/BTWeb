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
    // Query to select all records from MyGuests table
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, reg_date FROM MyGuests");
    $stmt->execute();

    // Set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    
    echo "<h2>Danh sách nhân viên</h2>";
    echo "<table border='1'>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Reg_Date</th>
            </tr>";
    foreach($results as $row) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['lastname']."</td>
                <td>".$row['reg_date']."</td>
              </tr>";
    }
    echo "</table>";

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
    <form action="main.php">
        <input type="submit" value="quay lại">
    </form>
</body>
</html>