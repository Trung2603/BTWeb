<!DOCTYPE html>
<html>
<head>
    <title>Thêm Nhân Viên</title>
</head>
<body>
    <h2>Thêm thông tin nhân viên</h2>
    <form action="insert_data.php" method="post">
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" required><br><br>
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Thêm nhân viên">
    </form>
</body>
</html>
