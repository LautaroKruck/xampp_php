<?php
    function Comprobar($x, $y) {
        if (is_numeric($x) && is_numeric($y)) {
            return true;
        }else return false;
    }

    function Sumar($x, $y) {
        if (Comprobar($x, $y)) {
        return $x + $y;
    } else return false;
    }

    function Restar($x, $y) {
        if (Comprobar($x, $y)) {
        return $x - $y;
    } else return false;
    }

    function Multiplicar($x, $y) {
        if (Comprobar($x, $y)) {
        return $x * $y;
    } else return false;
    }

    function Dividir($x, $y) {
        if (Comprobar($x, $y) && $y!=0) {
            if ($y == 0) {
                return "No se puede dicvidir por cero";
            } else return $x / $y;
    } else return false;
    }

?>