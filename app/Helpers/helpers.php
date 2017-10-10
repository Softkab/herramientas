<?php 
function urls_amigables($urllimpias) {

    // Tranformamos todo a minusculas

    $urllimpias = strtolower($urllimpias);

    //Rememplazamos caracteres especiales latinos

    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

    $repl = array('a', 'e', 'i', 'o', 'u', 'n');

    $urllimpias = str_replace ($find, $repl, $urllimpias);

    // Añaadimos los guiones

    $find = array(' ', '&', '\r\n', '\n', '+');
    $urllimpias = str_replace ($find, '-', $urllimpias);

    // Eliminamos y Reemplazamos demás caracteres especiales

    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

    $repl = array('', '-', '');

    $urllimpias = preg_replace ($find, $repl, $urllimpias);

    return $urllimpias;
    }
?>