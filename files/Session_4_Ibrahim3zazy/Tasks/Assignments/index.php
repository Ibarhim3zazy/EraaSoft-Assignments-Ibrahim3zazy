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
        // 1- Write a PHP script that records 3 digits and prints the total of the first two digits multiplied by the third digit.
        echo "<h2 style='color: #66f;'>Task 1 Result...</h2>";

        function calc($num_1, $num_2, $num_3) {
            return ($num_1 + $num_2) * $num_3;
        }
        echo "The result is: " . calc(1,2,4);

        // 2- A program that calculates the size of a box whose length and width are fixed with a value of 5 and 10 and the height is variable (size = length x width x height)
        echo "<h2 style='color: #66f;'>Task 2 Result...</h2>";

        function boxSize($length = 5, $width = 10, $height) {
            return $length * $width * $height;
        }
        echo "The result of box size is: " . boxSize(1,2,4);

        // 3- Write a PHP script that takes a number integer representing the hours and converts it to seconds
        echo "<h2 style='color: #66f;'>Task 3 Result...</h2>";

        function convertFromHoursToSeconds($hoursNum = 0) {
            return $hoursNum * 60 * 60;
        }
        echo "The Seconds number after converting from hours is: " . convertFromHoursToSeconds(1);

        // 4- Write a PHP script that calculates the Area of a Triangle store the base and height Print the area.
        echo "<h2 style='color: #66f;'>Task 4 Result...</h2>";

        function triangleArea($base, $height) {
            $triangleArea = .5 * $base * $height;
            return "<p>if the base of triangle is $base and the height of it is $height then the triangle area is: $triangleArea cm<sup>2</sup></p>";
        }
        echo triangleArea(5,3);

        // 5- Write a PHP script that takes the age in years and prints the age in days.
        echo "<h2 style='color: #66f;'>Task 5 Result...</h2>";

        function ConvertAgeFromYearsToDays($age) {
            echo '<p class="text-danger">Note: every month is calculated in 30 days</p>';
            if ($age > 100 && is_numeric($age)) {
                return "This person is over a hundred years old and his/her age in days is: " . $age * 12 * 30 . " day";
            }elseif ($age >= 0 && $age <= 100) {
                return "This person has a " . $age * 12 * 30 . " day";
            }else {
                return "Please write the correct age";
            }
        }
        echo ConvertAgeFromYearsToDays(.5);

        /**
        * EraaSoft Learn by practice
        * 6- Get the length of this sentence.
        */

        echo "<h2 style='color: #66f;'>Task 6:11 Result...</h2>";
        echo "The sentence in the task is: <h5 style='color: #f03;'>EraaSoft Learn by practice</h5>";

        $text = "EraaSoft Learn by practice";
        echo "the length of this sentence is: " . strlen($text) . "<br>";

        echo "<hr>";
        /**
        * EraaSoft Learn by practice
        * 7- Get the length of this sentence without spaces.
        */

        echo "the length of this sentence without spaces is: " . strlen(str_replace(" ", "", $text)) . "<br>";

        echo "<hr>";
        /**
        * EraaSoft Learn by practice
        * 8- Get the number of words in this sentence.
        */
        echo "Try 1: the number of words in this sentence is: " . str_word_count($text) . "<br>";
        $textArray = explode(" ", $text);
        echo "Try 2: the number of words in this sentence is: " . count($textArray) . "<br>";

        echo "<hr>";
        /**
        * EraaSoft Learn by practice
        * 9- Check if this word (by) exists in the string or not.
        */

        $find = "by";
        // Note: str_contains check by chars not words 
        if (str_contains($text, $find)) {
            echo "try 1: the chars [$find] exists in the string<br>";
        }else {
            echo "try 1: the chars [$find] not exists in the string<br>";
        }
        // Another Solution by array
        echo "try 2: ";
        function findWord($text, $find) {
            $textArray = explode(" ", $text);
            print_r($textArray);
            foreach ($textArray as $value) :
                if ($value == $find):
                    $exists = "Result by function: the word $find exists in the string<br>";
                endif;
            endforeach;
            if (isset($exists)) {
                echo $exists;
            }else {
                echo "Result by function: the word $find not exists in the string<br>";
            }    
        }
        findWord($text, $find);

        echo "<hr>";
        /**
        * EraaSoft Learn by practice
        * 10- Get the word (EraaSoft) from the string and print it.
        */

        // i used findWord function that i whriten it before this task
        $find = "EraaSoft";
        findWord($text, $find);

        echo "<hr>";
        /**
        * EraaSoft Learn by practice
        * 11- Remove the word (by) from the string and print the string with and without (by)
        */

        echo str_replace("by", "and", $text);

        // 12- Make a new variable called (Full_string) that concatenate string_one and string_two
        echo "<h2 style='color: #66f;'>Task 12:14 Result...</h2>";

        $string_one = "Eraa";
        $string_two = "Soft";
        $Full_string = $string_one . $string_two;
        echo $Full_string . "<hr>";

        // 13- Compare the full_string and this string (EraaSoft).

        echo strcmp($Full_string, "EraaSoft");
        echo "<br>If this function returns 0, the two strings are equal.";
        echo '<p class="text-danger">Note: Compare two strings (case-sensitive)</p>';

        /**
         * 14- Write a PHP script to split the following string.
         * Sample string: 'ErraSoft'
         * Expected Output: Er/ra/So/ft
         */

        echo "<hr>";
        // try 1
        echo "try 1: " . implode("/", str_split($Full_string, 2)) . "<br>";

        // try 2
        echo "try 2: ";
        for ($i=0; $i < strlen($Full_string); $i++) {
            for ($split=0; $split < strlen($Full_string); $split += 2) { 
                if ($split > 0 && $i == $split) {
                    echo "/";
                    break;
                }
            }
            echo $Full_string[$i];
        }
        echo "<hr>";
        // 15- Write a PHP script that stores the number as a variable and checks if it is odd oreven.
        echo "<h2 style='color: #66f;'>Task 15 Result...</h2>";

        $number = 2;

        if (is_numeric($number)) {
            if ($number % 2 == 0) {
                echo "the number $number is an even number";
            }elseif ($number % 2 != 0) {
                echo "the number $number is an odd number";
            }
        }else {
        echo "this is not a number";
        }

        echo "<hr>";
        // 16- Write a PHP script that stores the string as a variable and checks if it is odd or even.
        echo "<h2 style='color: #66f;'>Task 16 Result...</h2>";

        $text = "1";
        $txtLen = strlen($text);

        if (!is_numeric($text)) {
            if ($txtLen % 2 == 0) {
                echo "the text length of [$text] = $txtLen and it is an even number";
            }elseif ($txtLen % 2 != 0) {
                echo "the text length of [$text] = $txtLen and it is an odd number";
            }
        }else {
        echo "this is not a text";
        }

        echo "<hr>";
        /**
         * 17- Check from this string o If the string has “gain” Print ( success word ) o If the string has ( peen )
         * Print ( success word ) Else ( wrong word )
         */
        echo "<h2 style='color: #66f;'>Task 17 Result...</h2>";

        $description = "no pain , no gain ";

        if (str_contains($description, 'gain') || str_contains($description, 'peen')) {
            print "success word";
        }else {
            print "wrong word";
        }

        echo "<hr>";
        /**
         * 18- A Boolean is a data type that has only two values true or false. These values often
         * correspond to 1 (true) or 0 (false). When a 1 or a 0 is used, it's called an int Boolean.
         * Write a PHP script that stores an int Boolean and outputs its opposite
         * (1 becomes 0 and 0 becomes 1).
         */
        echo "<h2 style='color: #66f;'>Task 18 Result...</h2>";

        $booleanVar = true;
        if($booleanVar) {
            echo (int)!$booleanVar;
        }else {
            echo +!$booleanVar;
        }

        echo "<hr>";
        /**
         * 19- Write a PHP script that stores a word and determines Is the Word is Singular or Plural?
         * (A plural word is one that ends in "s".)
         */
        echo "<h2 style='color: #66f;'>Task 19 Result...</h2>";

        $word = "tree";
        if($word[-1] == "s") {
            echo "This word is Plural";
        }else {
            echo "This word is Singular";
        }

        echo "<hr>";
        /**
         * 20- Make a calculator with these operations using if and else if
         * ( Submission - Subtraction - Multiplication - Division - Power -  Modulus )
         */
        echo "<h2 style='color: #66f;'>Task 19 Result...</h2>";

        $num_1 = 20;
        $num_2 = 20;
        $op = "%";

        if (is_numeric($num_1)) {
            if (is_numeric($num_2)) {
                if ($op == "+") {
                    $result = $num_1 + $num_2;
                }elseif ($op == "-") {
                    $result = $num_1 - $num_2;
                }elseif ($op == "*") {
                    $result = $num_1 * $num_2;
                }elseif ($op == "/") {
                    if ($num_2 == 0) {
                        echo "undefined, division by zero is not allowed.";
                    }else {
                        $result = $num_1 / $num_2;
                    }  
                }elseif ($op == "**") {
                    $result = $num_1 ** $num_2;
                }elseif ($op == "%") {
                    if ($num_2 == 0) {
                        echo "undefined, Modulus by zero is not allowed.";
                    }else {
                        $result = $num_1 % $num_2;
                    }
                }
            }else {
                echo "the second input is not a number";
            }
        }else {
            echo "the first input is not a number";
        }
        if (isset($result)) {
            echo "the result of $num_1 $op $num_2 is $result";
        }
        

        MyName();
        ?>
        </div>
    </div>
</body>
</html>
