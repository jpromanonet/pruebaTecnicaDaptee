<?php

/**
 * 1- Multiplicar 2 numeros, sin utilizar el operador de multiplicacion.
 * 2- Obtener el numero mayor dentro de un arreglo. Solo iterar 1 vez.
 * 3- Dado un arreglo, eliminar todos los "undefined", "null", "false" y 0 
 *  (no sus valores en string). Iterar solo 1 vez.
 * 4- Dado un arreglo multidimensional, obtener todos los valores en un nuevo arreglo de una 
 *  sola dimension. Usar recursividad
 *  Ejemplo: [1, [2, [3, 4]], 'hola', [1, 'buenos dias']] => [1, 2, 3, 4, 'hola', 1, 'buenos dias']
 * 5- Dado un string, devolver un objeto/array que indique la palabra que mas veces se repite, y su cantidad.
 *    Ejemplo: "Este es un string, el cual es un string donde se repite muchas veces la 
 *    palabra es" => {es: 3} / ['es' => 3]
 * 6- Verificar si un string es un palíndromo.
 * 7- Dado 3 numeros, devolver el mayor. Adaptar esto para que funcione con cualquier cantidad de numeros.
 */

class Helper
{

  /**
   * Undocumented function
   *
   * @param integer $num
   * @param integer $otherNum
   * @return void
   */
  public static function getSuma($num, $otherNum)
  {
    $numAbs = 0;
    $otherNumAbs = 0;
    $result = 0;
    /**Obtenemos el valor absoluto del primer numero*/
    if ($num < 0) {
      $numAbs = $num * (-1);
    } else {
      $numAbs = $num;
    }
    /**Obtenemos el valor absoluto del otro numero*/
    if ($otherNum < 0) {
      $otherNumAbs = $otherNum * (-1);
    } else {
      $otherNumAbs = $otherNum;
    }
    /**Realizamos la multiplicación del numero 
     * sumando el num tantas veces como otherNum lo establezca
     */
    for ($i = 0; $i < $otherNumAbs; $i++) {
      $result += $numAbs;
    }

    return $result;
  }

  /**
   * Undocumented function
   *
   * @param array $unArray
   * @return void
   */
  public static function getNumMayorArray(array $unArray)
  {
    $resultNumMayor = 0;
    foreach ($unArray as $value) {
      if ($value > $resultNumMayor) {
        $resultNumMayor = $value;
      }
    }
    return $resultNumMayor;
  }

  /**
   * Undocumented function
   *
   * @param array $unArray
   * @return void
   */
  public static function filtrarArray(array $unArray)
  {
    return array_filter($unArray);
  }


  /**
   * Undocumented function
   *
   * @param array $unArray
   * @return void
   */
  public static function getFlatArray(array $unArray)
  {

    $result = array();
    /**Recorremos el array  */
    foreach ($unArray as $key => $value) {
      /**Verificamos si en esa posición se encuentra otro array y volvemos a procesar con la función */
      if (is_array($value)) {
        $result = array_merge($result, self::getFlatArray($value));
      } else {
        $result[$key] = $value;
      }
    }
    return $result;
  }

  /**
   * Undocumented function
   *
   * @param string $unaFrase
   * @return void
   */
  public static function getCountStringRepeat(string $unaFrase = "")
  {
    /**Limpiamos de la frase los caracteres que no corresponda a una
     * letra. 
     */
    $frase = preg_replace("/[^A-Za-z ]/", '', $unaFrase);
    /**Convertimos la frase un un array asi lo podemos contar todos los valores del 
     * de las palabras .
     */
    $palabras = array_count_values(explode(' ', $frase));
    /**Para almacenar el valor máximo 
     * y su clave correspondiente
     */
    $valueMax = null;
    $palabraMax = null;
    foreach ($palabras as $palabra => $value) {
      //Comprábamos que no sea nulo el valor máximo
      if ($valueMax === null || $value > $valueMax) {
        $palabraMax = $palabra;
        $valueMax = $value;
      }
    }

    return [$palabraMax => $valueMax];
  }
  /**
   * Undocumented function
   *
   * @param string $palabra
   * @return boolean
   */
  public static function isPalindrome(string $palabra)
  {
    /**Eliminados los espacios y lo pasamos todo a minúsculas */
    $palabra = strtolower(trim($palabra));
    /**Recorremos la palabra */
    for ($i = 0; $i < strlen($palabra); $i++) {
      /**Comprobamos si en la posición actual de la palabra 
       * es igual al la posición final de la palabra
       */
      if ($palabra[$i] == $palabra[strlen($palabra) - $i - 1]) {
        return true;
      }
    }
    return false;
  }
  /**
   * Undocumented function
   *
   * @return void
   */
  public static function getSumaNumeros()
  {
    /**Recibimos todos los argumentos de la función*/
    $numeros = func_get_args();
    $result = 0;
    foreach ($numeros as $numero) {
      $result += $numero;
    }

    return $result;
  }
}
