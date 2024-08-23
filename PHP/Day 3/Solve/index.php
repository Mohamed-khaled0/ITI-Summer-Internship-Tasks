<?php 

/*
Lab 03:
========
1- Write a PHP function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument.
2- Using loop: Write a PHP script using a nested for loop that creates a chess board as shown below. Use table width="270px" and take 30px as cell height and width.
3- Write a PHP program to print alphabet pattern 'M'.
4- Write a PHP function to check whether all array values are strings or not.
*/

// 1. Function to calculate factorial
function fac($num) {
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}
echo 'Factorial of 5: ' . fac(5);
echo '<hr>';

// 2. Function to create a chess board
echo '<table width="270px" border="1" cellspacing="0" cellpadding="0">';
for ($i = 0; $i < 8; $i++) {
    echo '<tr>'; // Table row
    for ($j = 0; $j < 8; $j++) {
        $color = ($i + $j) % 2 == 0 ? '#FFFFFF' : '#000000'; // Alternating colors
        echo '<td height="30px" width="30px" bgcolor="' . $color . '"></td>';
    }
    echo '</tr>';
}
echo '</table>';
echo '<hr>';

// 3. Function to print alphabet pattern 'M'
echo '<pre>';
$height = 13; 
for ($i = 0; $i < $height; $i++) { // Rows
    for ($j = 0; $j < $height; $j++) { // Columns
        if ($j == 0 || $j == $height - 1 ||  // Columns for the first and last
            ($i == $j && $i <= $height / 2) || // Diagonal for left side of 'M'
            ($i + $j == $height - 1 && $i <= $height / 2)) { // Diagonal for right side of 'M'
            echo "*";
        } else {
            echo " ";
        }
    }
    echo '<br>';
}
echo '</pre>';
echo '<hr>';

// 4. Function to check if all array values are strings
function checkOnArrays($arr) {
    foreach ($arr as $value) {
        if (!is_string($value)) {
            return "This is Not String Array";
        }
    }
    return "This is String Array";
}

$testArray = ["hello", "world", "php"];
echo checkOnArrays($testArray);

?>
