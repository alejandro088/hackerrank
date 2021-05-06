<?php

/*
 * Complete the 'camelcase' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function camelcase($str) {
    // Write your code here
    $count = 1;
    for ($i = 0; $i < strlen($str); $i++) {
        if(ctype_upper($str[$i])){
            $count++;
        }
    }

    return $count;

}

$fptr = fopen("data.txt", "w");

$str = rtrim(fgets(STDIN), "\r\n"); //get line

$result = camelcase($str);

fwrite($fptr, $result . "\n");

fclose($fptr);
