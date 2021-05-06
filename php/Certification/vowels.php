<?php

/*
* Dado un string, y un numero, determinar cual es el substring de tamaño
* del numero recibido con mayor cantidad de vocales.
* En caso haya la misma cantidad de vocales en mas de un substring,
* retornar el primero.
*
*
* Ejemplo:
* abiiousode
* 5
* Resultado: iious
*/

function vowels($str, $n)
{
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    
    $maxStrCount = 0;
    $maxStr = '';

    for ($i=0; $i <= strlen($str) - $n; $i++) {
        $count = 0;
        $subStr = substr($str, $i, $n);

        foreach ($vowels as $vowel) {
            $count += substr_count($subStr, $vowel);
        }

        if ($count > $maxStrCount) {
            $maxStr = $subStr;
            $maxStrCount = $count;
        }
    }


    return $maxStrCount ? $maxStr : 0;
}

$stdin = fopen("data.txt", "r");

fscanf($stdin, "%s\n", $str);

fscanf($stdin, "%d\n", $n);

echo vowels($str, $n);
echo PHP_EOL;

fclose($stdin);
