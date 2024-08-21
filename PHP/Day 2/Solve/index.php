<?php 

/* 
Assignment 
=========
LAP 02:=
=========
1-Write a PHP script to insert a string at the specified position in a given string.

Original String : 'The brown fox'
Insert 'quick' between 'The' and 'brown'.
------------------------------------------------------------------------------
2-Write a PHP script to remove all leading zeroes from a string.

Original String : '000547023.24'
------------------------------------------------------------------------------
3-Write a PHP script to remove comma(s) from the following numeric string.

Sample String : '2,543.12'
*/

// Task 1  

$original_string = 'The brown fox';
$insert_string = 'quick';

$words = explode(' ', $original_string);

array_splice($words, 1, 0, $insert_string);

$modified_string = implode(' ', $words);

echo $modified_string; 





// Task 2

$original_string = '000547023.24';

$modified_string = ltrim($original_string, '0');

echo $modified_string; 



// Task 3  

$original_string = '2,543.12';

$modified_string = str_replace(',', '', $original_string);

echo $modified_string; 