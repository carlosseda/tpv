<?php

    // variables

    // $color  = "rojo";

    // echo $color;

    // // concatenar texto con variables

    // $texto = "Hola";
    // $texto .= " Mundo";

    // echo $texto;
    
    // // operadores de asignación

    // $numero = 1;
    // $numero += 1;
    // $numero -= 1;
    // $numero *= 2;
    // $numero /= 2;

    // echo $numero;

    // // operadores de incremento y decremento

    // $numero = 1;
    // $numero++;
    // $numero--;

    // echo $numero;

    // // Condicional if, elseif, else

    // $color  = "azul";

    // if($color == "rojo") {
    //     echo "El color es rojo";
    // }elseif($color == "azul"){
    //     echo "El color es azul";    
    // } else {
    //     echo "El color no es rojo";
    // }

    // // operadores de lógicos

    // $numero = "1";
    // $numero2 = 1;

    // if ($numero == $numero2) {
    //     echo "Son iguales";
    // } else {
    //     echo "No son iguales";
    // }

    // if ($numero === $numero2) {
    //     echo "Son iguales";
    // } else {
    //     echo "No son iguales";
    // }

    // if ($numero != $numero2) {
    //     echo "No son iguales";
    // } else {
    //     echo "Son iguales";
    // }

    // if ($numero > $numero2) {
    //     echo "El primero es mayor";
    // } else {
    //     echo "El segundo es mayor";
    // }

    // if ($numero !== $numero2) {
    //     echo "Son iguales";
    // } else {
    //     echo "No son iguales";
    // }


    // if ($numero < $numero2) {
    //     echo "El primero es menor";
    // } else {
    //     echo "El segundo es menor";
    // }

    // if ($numero >= $numero2) {
    //     echo "El primero es mayor o igual";
    // } else {
    //     echo "El segundo es mayor o igual";
    // }

    // if ($numero <= $numero2) {
    //     echo "El primero es menor o igual";
    // } else {
    //     echo "El segundo es menor o igual";
    // }

    // // Switch

    // $color  = "amarillo";

    // switch($color) {
    //     case "rojo":
    //         echo "El color es rojo";
    //         break;
    //     case "azul":
    //         echo "El color es azul";
    //         break;
    //     default:
    //         echo "El color no es rojo ni azul";
    //         break;
    // }

    // // Arrays

    // $colores = ["rojo", "azul", "amarillo"];

    // echo $colores[1];

    // // Arrays asociativos

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "amarillo" => "Amarillo"
    // ];

    // echo $colores["rojo"];

    // // Arrays multidimensionales

    // $colores = [
    //     ["rojo", "Rojo"],
    //     ["azul", "Azul"],
    //     ["amarillo", "Amarillo"]
    // ];

    // echo $colores[0][1];

    // // Arrays multidimensionales asociativos

    // $usuarios = [
    //     "1" => [
    //         "nombre" => "Carlos",
    //         "apellidos" => "Seda"
    //     ],
    //     "2" => [
    //         "nombre" => "Luis",
    //         "apellidos" => "Martinez"
    //     ],
    //     "3" => [
    //         "nombre" => "Juan",
    //         "apellidos" => "Perez"
    //     ]
    // ];

    // foreach($usuarios as $usuario) {
    //     echo $usuario["nombre"] . " su apellido es " . $usuario["apellidos"] . "<br>";
    // }


    // // JSON

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "amarillo" => "Amarillo"
    // ];

    // $json = json_encode($colores);

    // echo $json;

    // // JSON asociativo multidimiensional

    // $colores = [
    //     "rojo" => [
    //         "nombre" => "Rojo",
    //         "color" => "rojo"
    //     ],
    //     "azul" => [
    //         "nombre" => "Azul",
    //         "color" => "azul"
    //     ],
    //     "amarillo" => [
    //         "nombre" => "Amarillo",
    //         "color" => "amarillo"
    //     ]
    // ];

    // $json = json_encode($colores);

    // echo $json;

    // // For

    // for($i = 0; $i < 10; $i++) {
    //     echo "El valor de i es: ".$i."<br>";
    // }

    // // For con array

    // $colores = ["rojo", "azul", "verde"];

    // for($i = 0; $i < count($colores); $i++) {
    //     echo "El valor de i es: ".$i."<br>";
    //     echo "El valor de colores[i] es: ".$colores[$i]."<br>";
    // }

    // // While

    // $i = 0;

    // while($i < 10) {
    //     echo "El valor de i es: ".$i."<br>";
    //     $i++;
    // }

    // // While con array

    // $colores = ["rojo", "azul", "verde"];
    // $i = 0;

    // while($i < count($colores)) {
    //     echo "El valor de i es: ".$i."<br>";
    //     echo "El valor de colores[i] es: ".$colores[$i]."<br>";
    //     $i++;
    // }

    // // Foreach con array

    // $colores = ["rojo", "azul", "verde"];

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // Foreach con array asociativo

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "verde" => "Verde"
    // ];

    // foreach($colores as $color => $nombre) {
    //     echo "El color es: ".$color."<br>";
    //     echo "El nombre es: ".$nombre."<br>";
    // }

    // // Foreach con array multidimensionales

    // $colores = [
    //     ["rojo", "Rojo"],
    //     ["azul", "Azul"],
    //     ["verde", "Verde"]
    // ];

    // foreach($colores as $color) {
    //     echo "El color es: ".$color[0]."<br>";
    //     echo "El nombre es: ".$color[1]."<br>";
    // }

    // // Foreach con array multidimensionales asociativos

    // $colores = [
    //     "rojo" => [
    //         "nombre" => "Rojo",
    //         "color" => "rojo"
    //     ],
    //     "azul" => [
    //         "nombre" => "Azul",
    //         "color" => "azul"
    //     ],
    //     "verde" => [
    //         "nombre" => "Verde",
    //         "color" => "verde"
    //     ]
    // ];

    // foreach($colores as $elemento => $atributo) {
    //     echo "El elemento es: ".$elemento."<br>";
    //     echo "El nombre es: ".$atributo["nombre"]."<br>";
    // }

    // // Funciones

    // saludar();

    // function saludar() {
    //     echo "Hola";
    // }

    // saludar();

    // // Funciones con parametros

    // function sumar($numero_1, $numero_2) {
    //     $resultado = $numero_1 + $numero_2;
    //     return $resultado;
    // }

    // echo "La suma de 2 y 3 es: ".sumar(7, 9)."<br>";

    // // Funciones habituales de PHP

    // // TEXTO

    // strlen(), sirve para saber la longitud de un string

    // $texto = "Hola mundo";

    // echo "El texto tiene una longitud de: ".strlen($texto)."<br>";

    // // strpos(), sirve para saber la posicion de un string dentro de otro string

    // $texto = "Hola mundo";

    // echo "La posicion de la letra 'o' es: ".strpos($texto, "o")."<br>";

    // substr(), sirve para obtener una parte de un string

    // $texto = "Hola mundo";

    // echo "La parte de la cadena 'Hola mundo' es: ".substr($texto, 0, 4)."<br>";

    // // strtoupper(), sirve para convertir un string a mayusculas

    // $texto = "Hola mundo";

    // echo "El texto en mayusculas es: ".strtoupper($texto)."<br>";

    // // strtolower(), sirve para convertir un string a minusculas

    // $texto = "Hola mundo";

    // echo "El texto en minusculas es: ".strtolower($texto)."<br>";

    // // str_replace(), sirve para reemplazar un string por otro string en un string

    // $texto = "Hola mundo";

    // echo "El texto reemplazado es: ".str_replace("o", "x", $texto)."<br>";

    // str_pad, sirve para rellenar un string con un string de una longitud determinada

    // $number = "40";
    // $number = str_pad($number, 5, '0', STR_PAD_LEFT); 

    // echo "El numero es: ".$number."<br>";    

    // // COMPROBACIÓN DE VARIABLES

    // // isset(), sirve para saber si una variable esta definida

    // if(isset($variable)) {
    //     echo "La variable existe<br>";
    //     echo isset($variable);
    // } else {
    //     echo "La variable no existe<br>";
    //     echo isset($variable);
    // }

    // // empty(), sirve para saber si una variable esta vacia

    // $variable = "";

    // if(empty($variable)) {
    //     echo "La variable esta vacia<br>";
    // } else {
    //     echo "La variable no esta vacia<br>";
    // }

    // // ARRAYS

    // // array(), sirve para crear un array

    // $array = array("rojo", "azul", "verde");

    // echo "El color es: ".$colores[0]."<br>";

    // // count(), sirve para saber la longitud de un array

    // $colores = ["rojo", "azul", "verde"];
    
    // echo "El numero de colores es: ".count($colores)."<br>";

    // // reset(), sirve para resetear el puntero del array

    // $colores = ["rojo", "azul", "verde"];

    // echo "El color es: ". reset($colores)."<br>";

    // end(), sirve para ir al final del array

    // $colores = ["rojo", "azul", "verde"];

    // echo "El color es: ". end($colores)."<br>";

    // // array_push(), sirve para añadir un elemento al final de un array

    // $colores = ["rojo", "azul", "verde"];

    // array_push($colores, "amarillo");

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_unshift(), sirve para añadir un elemento al principio de un array

    // $colores = ["amarillo", "azul", "verde"];

    // array_unshift($colores, "rojo");

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_pop(), sirve para eliminar un elemento del final de un array

    // $colores = ["rojo", "azul", "verde"];

    // array_pop($colores);

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_shift(), sirve para eliminar un elemento del principio de un array

    // $colores = ["rojo", "azul", "verde"];

    // array_shift($colores);

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // array_keys(), sirve para obtener las claves de un array

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "verde" => "Verde"
    // ];
    
    // $claves = array_keys($colores);

    // foreach($claves as $clave) {
    //     echo "La clave es: ".$clave."<br>";
    // }

    // // array_slice(), sirve para obtener una porcion de un array

    // $colores = ["rojo", "azul", "verde", "amarillo"];

    // $colores_nuevos = array_slice($colores, 1, 3);

    // foreach($colores_nuevos as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_splice(), sirve para eliminar una porcion de un array

    // $colores = ["rojo", "azul", "verde", "amarillo"];

    // array_splice($colores, 1, 2);

    // foreach($colores as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_key_exists(), sirve para saber si una clave existe en un array

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "verde" => "Verde"
    // ];
    
    // if(array_key_exists("rojo", $colores)) {
    //     echo "La clave existe<br>";
    // } else {
    //     echo "La clave no existe<br>";
    // }

    // // array_search(), sirve para buscar un elemento en un array

    // $colores = [
    //     "rojo" => "Rojo",
    //     "azul" => "Azul",
    //     "verde" => "Verde"
    // ];

    // $color = array_search("Rojo", $colores);

    // echo "El color es: ".$color."<br>";

    // // array_reverse(), sirve para invertir un array

    // $colores = ["rojo", "azul", "verde", "amarillo"];

    // $colores_nuevos = array_reverse($colores);

    // foreach($colores_nuevos as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_merge(), sirve para unir dos arrays

    // $colores = ["rojo", "azul", "verde", "amarillo"];

    // $colores_nuevos = ["naranja", "rosa", "morado"];

    // $colores_todos = array_merge($colores, $colores_nuevos);

    // foreach($colores_todos as $color) {
    //     echo "El color es: ".$color."<br>";
    // }

    // // array_combine(), sirve para crear un nuevo array a partir de dos arrays

    // $usuarios = ["carlos", "jaume", "julian"];

    // $colores = ["naranja", "rosa", "morado"];

    // $colores_asignados = array_combine($usuarios, $colores);

    // foreach($colores_asignados as $usuario => $color) {
    //     echo "El usuario es " .$usuario. " y su color es: ".$color."<br>";
    // }

    // explode(), sirve para separar un string en un array

    // $texto = "Hola mundo";

    // $array = explode(" ", $texto);

    // echo "El array es: ".$array[0]."<br>";

    // implode(), sirve para unir un array en un string

    // $array = ["Hola", "mundo"];

    // $texto = implode("/", $array);
    
    // echo "El texto es: ".$texto."<br>";

    // // FECHAS

    // date(), sirve para obtener la fecha actual

    // echo "La fecha es: ".date("d-m-Y")."<br>";

    // // time(), sirve para obtener la hora actual mediante tiempo Unix

    // echo "La hora es: ".time()."<br>";

    // // mktime(), sirve para crear una fecha a partir de una fecha y una hora

    // echo "La fecha es: ".date("H:i:s/d/m/Y", mktime(0, 0, 0, 1, 1, 2020))."<br>";

    // // getdate(), sirve para obtener un array con la fecha y hora actual

    // $fecha = getdate();

    // echo "La fecha es: ".$fecha["mday"]."/".$fecha["mon"]."/".$fecha["year"]."<br>";

    // // date_default_timezone_set(), sirve para establecer la zona horaria

    // date_default_timezone_set("Europe/Madrid");

    // echo "La hora es: ".date("H:i:s")."<br>";

    // // strftime(), sirve para obtener una cadena de texto con la fecha y hora actual

    // echo "La fecha es: ".strftime("%d/%m/%Y")."<br>";

    // // setlocale(), sirve para establecer el idioma y el pais de la fecha

    // setlocale(LC_ALL, "es_ES");

    // echo "La fecha es: ".strftime("%d/%m/%Y")."<br>";

    // // INTERACCIÓN CON ARCHIVOS

    // // fopen(), sirve para abrir un fichero

    // $fichero = fopen("fichero.txt", "w");

    // // fwrite(), sirve para escribir en un fichero

    // fwrite($fichero, "Hola mundo");

    // // fclose(), sirve para cerrar un fichero

    // fclose($fichero);

    // // file_put_contents(), sirve para escribir en un fichero sin necesidad de
    // // abrirlo previamente

    // file_put_contents("fichero.txt", "Hola mundo");

    // // file_put_contents(), sirve para escribir en un fichero con saltos de linea

    // $texto = "Esto es un ejemplo de texto";

    // file_put_contents("fichero.txt", $texto."\n", FILE_APPEND);

    // // file_get_contents(), sirve para leer un fichero

    // $contenido = file_get_contents("fichero.txt");

    // echo "El contenido del fichero es: ".$contenido."<br>";

    // // file_exists(), sirve para saber si un fichero existe

    // if(file_exists("fichero.txt")) {
    //     echo "El fichero existe<br>";
    // } else {
    //     echo "El fichero no existe<br>";
    // }

    // // filesize(), sirve para obtener el tamaño de un fichero

    // echo "El tamaño del fichero es: ".filesize("fichero.txt")."<br>";

    // // is_file(), sirve para saber si un fichero es un fichero

    // if(is_file("fichero.txt")) {
    //     echo "El fichero es un fichero<br>";
    // } else {
    //     echo "El fichero no es un fichero<br>";
    // }

    // // is_dir(), sirve para saber si un fichero es un directorio

    // if(is_dir("fichero.txt")) {
    //     echo "El fichero es un directorio<br>";
    // } else {
    //     echo "El fichero no es un directorio<br>";
    // }

    // // is_readable(), sirve para saber si un fichero es legible

    // if(is_readable("fichero.txt")) {
    //     echo "El fichero es legible<br>";
    // } else {
    //     echo "El fichero no es legible<br>";
    // }

    // // is_writable(), sirve para saber si un fichero es escribible

    // if(is_writable("fichero.txt")) {
    //     echo "El fichero es escribible<br>";
    // } else {
    //     echo "El fichero no es escribible<br>";
    // }

    // // is_executable(), sirve para saber si un fichero es ejecutable

    // if(is_executable("fichero.txt")) {
    //     echo "El fichero es ejecutable<br>";
    // } else {
    //     echo "El fichero no es ejecutable<br>";
    // }

    // // EJEMPLO DE SCRAPING

    // $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, "https://www.ultimahora.com");

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $resultado = curl_exec($ch);

    // curl_close($ch);

    // // // DOMDocument, sirve para crear un documento XML o HTML

    // $doc = new DOMDocument();   

    // // // loadHTML(), sirve para cargar un documento HTML o XML en un DOMDocument

    // $doc->loadHTML($resultado);

    // // getElementsByTagName(), sirve para obtener una lista de elementos por su tag

    // $lista = $doc->getElementsByTagName("a");

    // foreach($lista as $elemento) {
    //     echo "El elemento es: ".$elemento->nodeValue."<br>";
    // }

    // // getElementById(), sirve para obtener un elemento por su id

    // $elemento = $doc->getElementById("hamburger-menu");

    // echo "El elemento es: ".$elemento->nodeValue."<br>";

    // // obtener una lista de elementos por su clase "author"

    // $xpath = new DOMXpath($doc);
    // $authors = $xpath->query('//span[contains(@class, "sc-jlCeNt")]'); 

    // foreach($authors as $author) {
    //     echo "El elemento es: ".$author->nodeValue."<br>";
    // }




    // 1º No hay ningún ticket creado hoy, por lo que se crea uno nuevo
    // con fecha de hoy y empieza por el 0001

    // 2 Si hay un ticket creado hoy, por lo que tengo que añadir uno nuevo
    // con fecha de hoy y empieza por el último ticket creado + 1

    

    $tickets = ['2205290001', '2205290002', '2206150003', '220615004'];

    function newTicket($tickets) {
        
        $date = date("ymd");
        $last_ticket = end($tickets);
           
        // A partir de php 8.0 se puede usar la función str_contains() para no tener que hacer !== false

        if(strpos($last_ticket, $date) !== false){
            $ticket = $last_ticket + 1; 
        } else {
            $ticket = $date . "0001";
        };
     
        return $ticket;
    }

    echo newTicket($tickets);
// ?>

