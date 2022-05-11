<?php

    function Primos($inicial, $final)
    {
        $inicial = is_int($inicial) ? $inicial : intval($inicial);
        $final = is_int($final) ? $final : intval($final);

        if ($final < $inicial) {

            $temp_num = $inicial;
            $inicial = $final;
            $final = $temp_num;
        }

        
        $primos = array();

        for ($i = $inicial+1; $i <= $final-1; $i++) {
            $conta_divisores = 0;
            for ($j = 1; $j <= $i; $j++) {
                if (($i % $j) == 0) {
                    $conta_divisores++;
                }
            };
            if ($conta_divisores <= 2) {
                array_push($primos, $i);
            }
        }

        return $primos;
    }

    //echo json_encode(Primos(10,30));

?>