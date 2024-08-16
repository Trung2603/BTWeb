<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 3;
        $b = 4;
        $c = 10;
        $songuyento = true;
        $d = 0;
        echo "a + b = " . $a+$b ."<br>"; 
        echo "a - b = " . $a-$b ."<br>";
        echo "a * b = " . $a*$b ."<br>";
        echo "a / b = " . $a/$b ."<br>";
        if ($c < 0 ) {
            return $songuyento = false;
        }

        for ($i = 2; $i < sqrt($c); $i++) {
            if ($c % $i == 0) {
                $isPrime = false;
                break;
            }
        }

        if ($isPrime == false) {
            echo "$c khong phai so nguyen to <br>"; 
        } else {
            echo "$c la so nguyen to <br>";
        }
        if ($d % 2 == 0){
            echo "$d la so chan <br>";
        } else {
            echo "$d la so le <br>";
        }
    ?>
</body>
</html>