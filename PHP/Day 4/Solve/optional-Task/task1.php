<?php 

$handle = fopen("math.txt", "r"); //just read 

for ($line=1; !feof($handle); $line++) {
    echo "Line $line => " . fgets($handle) . "<br>";
}

fclose($handle);