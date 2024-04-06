<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheet 1 P1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <?php require_once "signature.php"; ?>
        <div class="row">
        <?php
        // 1- Write a PHP program to compute the sum of the two given integer
        // values. If the two values are the same, then triple their sum.
        // Sample Input
        // 1, 2
        // 3, 2
        // 2, 2
        // Sample Output:
        // 3
        // 5
        // 12
        echo "<h2 style='color: #66f;'>Task 1 Result...</h2>";

        $num_1 = 2;
        $num_2 = 2;

        if (is_numeric($num_1)) {
            if (is_numeric($num_2)) {
                if ($num_1 == $num_2) {
                    $result = ($num_1 + $num_2) * 3;
                }else {
                    $result = $num_1 + $num_2;
                }
            }else {
                echo "the second input is not a number";
            }
        }else {
            echo "the first input is not a number";
        }
        if (isset($result) && $num_1 != $num_2) {
            echo "the result of $num_1 + $num_2 is $result";
        } elseif (isset($result)) {
            echo "the result of ($num_1 + $num_2) * 3 is $result";
        }
        
        // 2- Write a PHP program to create a new string where 'if' is added to the
        // front of a given string. If the string already begins with 'if', return the
        // string unchanged.
        // Sample Input:
        // "if else"
        // "else"
        // "if"
        // Sample Output:
        // if else
        // if else
        // if
        echo "<h2 style='color: #66f;'>Task 2 Result...</h2>";

        $newText = "if";
        $check = null;

        for ($i=0; $i < 2; $i++) { 
            $check .= $newText[$i];
        }
        if ($check == "if") {
            echo $newText;
        }else {
            $newText = "if " . $newText;
            echo $newText;
        }

        // 3- Write a PHP program to check if a given positive number is a multiple of 3 or a
        // multiple of 7.
        // Sample Input
        // 3
        // 14
        // 12
        // 37
        // Sample Output:
        // bool(true)
        // bool(true)
        // bool(true)
        // bool(false)
        echo "<h2 style='color: #66f;'>Task 3 Result...</h2>";

        $number = 37;
        if ($number > 0) {
            if ($number % 3 == 0) {
                var_dump(!(bool)($number % 3));
            }elseif ($number % 7 == 0) {
                var_dump(!(bool)($number % 7));
            }else {
                var_dump(!(bool)($number % 7));
            }
        }

        // 4- Swapping Two Number
        // Sample Input
        // X = 5, Y=10
        // Sample Output:
        // X = 10, Y = 5
        echo "<h2 style='color: #66f;'>Task 3 Result...</h2>";

        $x = 5;
        $y = 10;
        $z = null;

        $z = $x;
        $x = $y;
        $y = $z;

        echo "variable x = $x & variable y = $y";

        // 5- Swapping Two Number (without using another (Third) variable)
        // Sample Input
        // X = 5, Y=10
        // Sample Output:
        // X = 10, Y = 5
        echo "<h2 style='color: #66f;'>Task 4 Result...</h2>";

        $x = 5;
        $y = 10;

        $x += $y;
        $y = $x - $y;
        $x = $x - $y;

        echo "variable x = $x & variable y = $y";

        // 6- Swapping Two Number (without using another (Third) variable) 🡺 using XOR
        // Operator
        // Sample Input
        // X = 5, Y=10
        // Sample Output:
        // X = 10, Y = 5
        echo "<h2 style='color: #66f;'>Task 6 Result...</h2>";

        $x = 5;
        $y = 10;

        $x = $x ^ $y;
        $y = $x ^ $y;
        $x = $x ^ $y;
        echo "variable x = $x & variable y = $y";


        // 7- . Write a PHP program to check a positive integer and print true if it contains a
        // number 3. (Without using Loop)
        // Sample Input:
        // 123
        // 13
        // 222
        // Sample Output:
        // bool(true)
        // bool(true)
        // bool(false)
        echo "<h2 style='color: #66f;'>Task 7 Result...</h2>";

        $number = "a";

        if (is_numeric($number) && $number > 0) {
            if (str_contains((string)$number, "3")) {
               echo "The number '3' was found\n";
            }else {
                echo "The number '3' was not found\n";
            }
        }else {
            echo "it's not a number";
        }

        // Problem statement task
        echo "<h2 style='color: #66f;'>Task 8 Result...</h2>";

        // $m = 65;
        // $p = 55;
        // $c = 50;
        // $total = 190;
        // $m + $p = 140;

        $m = 65;
        $p = 100;
        $c = 50;
        
        if ($m >= 65 && $p >= 55 && $c >= 50) {
            if ($m + $p + $c >= 190 || $m + $p >= 140) {
                echo "You are passed";
            }else {
                echo "You are failed";
            }
        }else {
            echo "You are failed";
        }

        MyName();
        ?>
        </div>
    </div>
</body>
</html>
