<?php

ini_set('max_execution_time', '9');
ini_set('memory_limit', '512M');

// Complete the minimumSwaps function below.
function minimumSwaps($arr) {
    

    $size = count($arr);
    $counter = 0;

    for ($i=0; $i < count($arr); $i++) { 
        echo $arr[$i] . " ";
    }

    print("\n");

    for ($i=0; $i < $size; $i++) { 
        # code...
        if (($i+1) != $arr[$i]){
            /*$key = array_search(($i+1), $arr);
            $tmp = $arr[$i];
            $arr[$i] = ($i+1);
            $arr[$key] = $tmp;
            $counter ++;*/

            $value = $arr[$i];
            $tmp = $arr[$value-1];
            $arr[$value-1] = $value;
            //$tmp = $arr[($i+1)];
            $arr[$i] = $tmp;
            $counter++;
            

        }
    }

    echo $counter . "\n";
    for ($i=0; $i < count($arr); $i++) { 
        echo $arr[$i] . " ";
    }
    
    

}

$stdin = fopen("data2.txt", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

minimumSwaps($arr);

fclose($stdin);
