<?php

ini_set('max_execution_time', '9');
ini_set('memory_limit', '512M');

function isTooChaotic($q)
{
    $isTooChaotic = false;
    $n = count($q);

    for ($i = 0; $i < $n-1; $i++) {
        if (($q[$i] - ($i+1)) > 2) {
            $isTooChaotic = true;
            print("Too chaotic\n");
            break;
        }
    }

    return $isTooChaotic;
}

function countSwaps($q)
{
    $count = 0;
    $n = count($q);
    $i = 0;
    while ($i < ($n - 1)) {
        if ($i >= 0 && $q[$i] > $q[$i + 1]) {
            $temp = $q[$i];
            $q[$i] = $q[$i + 1];
            $q[$i + 1] = $temp;

            $count++;
            $i -= 2;
        }
        $i++;
    }

    return $count;
}

function minimumBribesOptimized($q)
{
    
    $isTooChaotic = isTooChaotic($q);

    if (!$isTooChaotic) {

        $count = countSwaps($q);    
        print("$count\n");

    }
}

// Complete the minimumBribes function below.
function minimumBribes($q)
{
    $n = count($q);
    $briber = array_fill(1, $n, 0);
    $ctr = 0;

    $swapped = true;
    while ($swapped) {
        $swapped = false;
        for ($i=0; $i<$n-1; $i++) {
            if ($q[$i] > $q[$i+1]) {
                // swap positions between direct elements
                $temp = $q[$i];
                $q[$i] = $q[$i+1];
                $q[$i+1] = $temp;
                
                $swapped = true;

                $curr_val = $briber[$q[$i+1]];
                $briber[$q[$i+1]] = $curr_val + 1;
                
                $ctr += 1;
                continue;
            }
        }
    }

    if (max($briber) > 2) {
        print("Too chaotic");
        print("\n");
    } else {
        print($ctr);
        print("\n");
    }
}

$stdin = fopen("data.txt", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribesOptimized($q);
}

fclose($stdin);
