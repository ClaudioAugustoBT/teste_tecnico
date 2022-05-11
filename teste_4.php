<?php

function esta_ordenado($arr)
{
    //Verifica se o array já esta ordenado
    $arr_ordenado = $arr;
    asort($arr_ordenado);

    $conta_diff = count(array_diff_assoc($arr, array_values($arr_ordenado)));

    return $conta_diff > 0 ? false : true;
}

function tem_repeticao($arr)
{
    //Verifica se tem algum numero que se repete mais de uma vez
    //ou se mais de um numero se repete
    $repete_1 = 0;
    $repete_mais = 0;

    for ($i = 0; $i < count($arr); $i++) {
        $count_rep = 0;
        for ($j = 0; $j < count($arr); $j++) {
            if ($arr[$i] == $arr[$j] && $i != $j) {
                $count_rep++;
            }
        }

        if ($count_rep == 1) {
            $repete_1++;
        } else if ($count_rep > 1) {
            $repete_mais++;
        }
    }

    // echo $repete_1 . " / " . $repete_mais . " - ";

    $status = false;
    if ($repete_1 == 0 && $repete_mais == 0) {
        $status = false;
    } else if ($repete_1 > 2 || $repete_mais > 0) {
        $status = true;
    }

    return $status;
}

function retira_elementos($arr)
{
    // verifica a retirada de cada elemento 
    $status = false;

    for ($i = 0; $i < count($arr); $i++) {
        $temp_arr = $arr;
        unset($temp_arr[$i]);
        $temp_arr_ordenado = $temp_arr;
        asort($temp_arr_ordenado);

        $conta_diff = count(array_diff_assoc(array_values($temp_arr), array_values($temp_arr_ordenado)));

        if ($conta_diff > 0) {
            $status = false;
        } else {
            $status = true;
            break;
        }
    }

    return $status;
}

function verifica_sequancia($arr)
{
    $status = 0;

    if (esta_ordenado($arr)) {

        // echo "Ordenado |>>| ";

        if (tem_repeticao($arr)) {
            // echo "Tem Num. repetido |>>| ";

            $status = 1;
        } else {
            // echo "Não Tem Num. repetido |>>| ";
            $status = 0;
        }
    } else {
        // echo "Desordenado |>>| ";
        if (tem_repeticao($arr)) {
            // echo "Tem Num. repetido |>>| ";

            $status = 1;
        } else {
            // echo "Não Tem Num. repetido |>>| ";
            if (retira_elementos($arr)) {
                // echo "TRUE";
            } else {
                // echo "FALSE";
            }
        }
    }



    // echo " || Status:" . $status."<<<::::>>>";
}

function SequenciaCrescente($arr)
{

    $status = false;

    if (count($arr) <= 2) {
        $status = true;
    } else {
        if (esta_ordenado($arr)) {

            if (tem_repeticao($arr)) {
                $status = false;
            } else {
                $status = true;
            }
        } else {
            // echo "Desordenado |>>| ";
            if (tem_repeticao($arr)) {
                $status = false;
            } else {
                // echo "Não Tem Num. repetido |>>| ";
                if (retira_elementos($arr)) {
                    $status = true;
                } else {
                    $status = false;
                }
            }
        }
    }


    return $status ? "TRUE" : "FALSE";
}

//verifica_sequancia(array(10, 1, 2, 3, 4, 5));
//print_r(SequenciaCrescente(Array(1, 3, 2, 1)));

echo json_encode(array(1, 3, 2, 1)) . " -> " . SequenciaCrescente(array(1, 3, 2, 1)) . "\n";
echo json_encode(array(1, 3, 2)) . " -> " . SequenciaCrescente(array(1, 3, 2)) . "\n";
echo json_encode(array(1, 2, 1, 2)) . " -> " . SequenciaCrescente(array(1, 2, 1, 2)) . "\n";
echo json_encode(array(3, 6, 5, 8, 10, 20, 15)) . " -> " . SequenciaCrescente(array(3, 6, 5, 8, 10, 20, 15)) . "\n";
echo json_encode(array(1, 1, 2, 3, 4, 4)) . " -> " . SequenciaCrescente(array(1, 1, 2, 3, 4, 4)) . "\n";
echo json_encode(array(1, 4, 10, 4, 2)) . " -> " . SequenciaCrescente(array(1, 4, 10, 4, 2)) . "\n";
echo json_encode(array(10, 1, 2, 3, 4, 5)) . " -> " . SequenciaCrescente(array(10, 1, 2, 3, 4, 5)) . "\n";
echo json_encode(array(1, 1, 1, 2, 3)) . " -> " . SequenciaCrescente(array(1, 1, 1, 2, 3)) . "\n";
echo json_encode(array(0, -2, 5, 6)) . " -> " . SequenciaCrescente(array(0, -2, 5, 6)) . "\n";
echo json_encode(array(1, 2, 3, 4, 5, 3, 5, 6)) . " -> " . SequenciaCrescente(array(1, 2, 3, 4, 5, 3, 5, 6)) . "\n";
echo json_encode(array(40, 50, 60, 10, 20, 30)) . " -> " . SequenciaCrescente(array(40, 50, 60, 10, 20, 30)) . "\n";
echo json_encode(array(1, 1)) . " -> " . SequenciaCrescente(array(1, 1)) . "\n";
echo json_encode(array(1, 2, 5, 3, 5)) . " -> " . SequenciaCrescente(array(1, 2, 5, 3, 5)) . "\n";
echo json_encode(array(1, 2, 5, 5, 5)) . " -> " . SequenciaCrescente(array(1, 2, 5, 5, 5)) . "\n";
echo json_encode(array(10, 1, 2, 3, 4, 5, 6, 1)) . " -> " . SequenciaCrescente(array(10, 1, 2, 3, 4, 5, 6, 1)) . "\n";
echo json_encode(array(1, 2, 3, 4, 3, 6)) . " -> " . SequenciaCrescente(array(1, 2, 3, 4, 3, 6)) . "\n";
echo json_encode(array(1, 2, 3, 4, 99, 5, 6)) . " -> " . SequenciaCrescente(array(1, 2, 3, 4, 99, 5, 6)) . "\n";
echo json_encode(array(123, -17, -5, 1, 2, 3, 12, 43, 45)) . " -> " . SequenciaCrescente(array(123, -17, -5, 1, 2, 3, 12, 43, 45)) . "\n";
echo json_encode(array(3, 5, 67, 98, 3)) . " -> " . SequenciaCrescente(array(3, 5, 67, 98, 3)) . "\n";
