<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error {color: #FF0000;}
    </style>

<script>
        function validateForm() {
            let isValid = true;
            let tensach = document.forms["bookForm"]["tensach"].value;
            let tacgia = document.forms["bookForm"]["tacgia"].value;
            let nxb = document.forms["bookForm"]["nxb"].value;
            let nam = document.forms["bookForm"]["nam"].value;

            if (tensach == "") {
                document.getElementById("tensachErr").innerHTML = "Bạn phải điền tên sách";
                isValid = false;
            } else {
                document.getElementById("tensachErr").innerHTML = "";
            }

            if (tacgia == "") {
                document.getElementById("tacgiaErr").innerHTML = "Bạn phải điền tác giả";
                isValid = false;
            } else {
                document.getElementById("tacgiaErr").innerHTML = "";
            }

            if (nxb == "") {
                document.getElementById("nxbErr").innerHTML = "Bạn phải điền nhà xuất bản";
                isValid = false;
            } else {
                document.getElementById("nxbErr").innerHTML = "";
            }

            if (nam == "") {
                document.getElementById("namErr").innerHTML = "Bạn phải điền năm xuất bản";
                isValid = false;
            } else if (isNaN(nam) || nam.length != 4 || nam < 1000 || nam > new Date().getFullYear()) {
                document.getElementById("namErr").innerHTML = "Bạn phải điền năm xuất bản hợp lệ";
                isValid = false;
            } else {
                document.getElementById("namErr").innerHTML = "";
            }

            return isValid;
        }
    </script>
</head>
<body>
<?php
$tensachErr = $tacgiaErr = $nxbErr = $namErr = "";
$tensach = $tacgia = $nxb = $nam = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["tensach"])) {
    $tensachErr = "Bạn phải điền tên sách";
  } else {
    $tensach = test_input($_POST["tensach"]);
  }
  
  if (empty($_POST["tacgia"])) {
    $tacgiaErr = "Bạn phải điền tác giả";
  } else {
    $tacgia = test_input($_POST["tacgia"]);
  }
    
  if (empty($_POST["nxb"])) {
    $nxbErr = "Bạn phải điền nhà xuất bản";
  } else {
    $nxb = test_input($_POST["nxb"]);
  }

  if (empty($_POST["nam"])) {
    $namErr = "Bạn phải điền năm sinh";
  } else {
    $nam = test_input($_POST["nam"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Tên sách:  <input type="text" name="tensach">
        <span class="error">*<?php echo $tensachErr;?></span><br>
        Tác giả: <input type="text" name="tacgia">
        <span class="error">*<?php echo $tacgiaErr;?></span><br>
        Nhà xuất bản: <input type="text" name="nxb">
        <span class="error">*<?php echo $nxbErr;?></span><br>
        Năm xuất bản: <input type="year" name="nam">
        <span class="error">*<?php echo $namErr;?></span><br>
        <input type="submit">
    </form>
    
    <div>
        Tên sách là: <?php echo $tensach?><br>
        Tác giả là: <?php echo $tacgia?><br>
        Nhà xuất bản là: <?php echo $nxb?><br>
        Năm xuất bản là: <?php echo $nam?><br>
    </div>
</body>
</html>