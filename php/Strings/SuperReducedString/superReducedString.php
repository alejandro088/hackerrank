<?php

/*
 * Complete the 'superReducedString' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function superReducedString($s)
{
    // Write your code here

    $res = $s;
   
    $flag = true;
    
    while ($flag) {
        $flag = false;
        for ($i = 0; $i < (strlen($res) - 1); $i++) {
            if ($res[$i] == $res[$i+1]) {
                $flag = true;
                $x = substr($res, $i, 2);
                $res = str_replace($x, '', $res);
            }
        }
    }
    
    return $res == '' ? 'Empty String' : $res;
}
$fptr = fopen("data.txt", "w");
//$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = superReducedString($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
