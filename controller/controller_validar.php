<?php
function validarCedula($cedula) {
    $suma = 0;

    for ($i = 0; $i < strlen($cedula) - 1; $i++) {
        $capCaracter = intval($cedula[$i]);

        if ($i % 2 == 0) { // posicion par=0
            $capCaracter *= 2; // el numero de la posicion par se multiplica por 2

            if ($capCaracter > 9) { // resultado >9, se resta 9
                $capCaracter -= 9;
            }
        }

        $suma += $capCaracter; // suma los resultados de cada posicion
    }

    $resta = 0;
    if ($suma % 10 != 0) {
        $acum = (intval($suma / 10) + 1) * 10;
        $resta = $acum - $suma;
    }

    $digitoVerificador = intval($cedula[9]);
    return $digitoVerificador === $resta;
}
?>
