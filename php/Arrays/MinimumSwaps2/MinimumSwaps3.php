<?php

ini_set('max_execution_time', '9');
ini_set('memory_limit', '512M');


// Complete the minimumSwaps function below.
function minimumSwaps($arr)
{
    
    $swapCount = 0;
    $minIndex = 0;
    $min = $arr[0];

    for ($i=1; $i < count($arr); $i++) { 
        if ($arr[$i] < $min) {
            $minIndex = $i;
            $min = $arr[$i];
        }
    }

    if ($minIndex != 0) {
        $temp = $arr[0];
        $arr[0] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
        $swapCount++;
    }

    for ($cur=1; $cur < count($arr); $cur++) { 
        # code...
        $pos = $arr[$cur] - $arr[0];
        while($arr[$pos] != $arr[$cur]){
            $temp = $arr[$pos];
            $arr[$pos] = $arr[$cur];
            $arr[$cur] = $temp;
            $swapCount++;
            $pos = $arr[$cur] - $arr[0];
        }
        $cur = $pos;
    }
    
    
    echo $swapCount;
}

$stdin = fopen("data2.txt", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

minimumSwaps($arr);

fclose($stdin);
