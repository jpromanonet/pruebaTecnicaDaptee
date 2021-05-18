<?php
require_once('./Helper.php');


$producto = Helper::getSuma(3,4);
echo "Multiplicación de 3 * 4 es {$producto}";

$numMayor = Helper::getNumMayorArray([1,5,8,8,6,1,2,8,2,5,58,7,]);
echo "</br>";
echo "Numero Mayor en el Array es {$numMayor}";
echo "</br>";
$arrayFiltrar = [
    0 => 'Matelab',
    1 => false,
    2 => -1,
    3 => null,
    4 => '',
    5 => '0',
    6 => 0,
];
$arrayFiltrado = Helper::filtrarArray($arrayFiltrar);
echo "Arreglo filtrado "; print_r($arrayFiltrado);
echo "</br>";

$arrayMulti = [1, [2, [3, 4]], 'hola', [1, 'buenos dias']];
$arrayFlat = Helper::getFlatArray($arrayMulti);

echo "Arreglo de un Sola Dimension "; print_r($arrayFlat);
echo "<br>";
$frase = "Este es un string, el cual es un string donde se repite muchas veces la palabra es";
echo "Palabra que mas se repite en un frase "; print_r(Helper::getCountStringRepeat($frase));
echo "<br>";
$sumaNumeros = Helper::getSumaNumeros(1,4,8,3,);
echo "La suma de los números es {$sumaNumeros}";
echo "<br>";
$palabra = "somos";

echo Helper::isPalindrome($palabra) ? "La palabra es Palindromo" : "La palabra no es Palindromo";
