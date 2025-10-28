<?php
require_once("catalogo_productos.php");

//FUNCIONES RICAS RICAS (LA VIDA ERA MAS FELIZ SIN LA FUNCION DE SELECCIONAR CAMPOS)
//CON ESTA FUNCION IGUALAMOS LOS VALORES
function filtrar_igual($productos, $campo, $valor) {
    return array_filter($productos, fn($producto) => $producto[$campo] == $valor);
}
//ESTA SOLO FUNCIONA CON NUMERICOS, SIRVE PARA MOSTRAR VALORES MAYORES QUE EL INDICADO
function filtrar_mayor($productos, $campo, $valor) {
    return array_filter($productos, fn($producto) => $producto[$campo] > $valor);
}
//ESTA SOLO FUNCIONA CON NUMERICOS, SIRVE PARA MOSTRAR VALORES MENORES QUE EL INDICADO
function filtrar_menor($productos, $campo, $valor) {
   return array_filter($productos, fn($producto) => $producto[$campo] < $valor);
}
//ESTA BUSCA EN EL STRING LOS VALORES INDICADOS EN EL TEXTO, YA SEA CUALQUIER CARACTER
function filtrar_contiene($productos, $campo, $valor) {
  return array_filter($productos, fn($producto) =>  stripos($producto[$campo], $valor) !== false);
}
//ESTA FUNCION ES UN ASCO, TE DEVUELVE UN ARRAY CON  LAS CLAVES DE LOS CAMPOS SELECCIONADOS
function seleccionar_campos($productos, $campos) {
    if(empty($campos) || in_array("*", $campos, true)) {
        return $productos;
    }
    $campos = array_values($campos) ;
        return array_map(function($producto) use($campos) { 
            return array_intersect_key($producto, array_flip($campos));
        }, $productos);
}
//ESTA NO TIENE COMPLICACION ALGUNA, CON ESTO CREAMOS LA TABLA CON TODOS LOS PRODUCTOS, TAMBIEN NOS VALE PARA MOSTRAR LOS PRODUCTOS FILTRADOS
//Y TODO FUNCA PERFECTO
function imprimirTabla($productos){
    if (empty($productos)) {
        echo "<p>No hay productos que mostrar</p>";
        return;
    }
   echo "<table border=1px><tr>";
            foreach (array_keys($productos[0]) as $nombreProducto) {
                echo "<th>" . ucfirst($nombreProducto) . "</th>";
            }
        echo"</tr>";
             foreach ($productos as  $producto) {
                echo "<tr>";
                foreach ($producto as $valor) {
                    echo "<td>" . $valor ."</td>";
                }
                echo "</tr>";
            }
            
            echo "</table>";
}

//AQUI COMPRUEBA QUE EL METODO DE PETICION ES POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $campos = $_POST["CampoASeleccionar"] ?? [];
    $filtro = $_POST["filtroProducto"];
    $funcion = $_POST["conSin"];
    $criterio = $_POST["criterio"];

    $productos_filtrados = $productos; 
//SI NO LE DAMOS NINGUN VALOR A NADA CREAMOS UN ARRAY ASOCIATIVO CON LAS CLAVES Y VALORES CON LAS QUE ASOCIAREMOS AL CAMPO
    if ($filtro != "sc" && $funcion != "sin" && $criterio !== "") {

        $todo = [
            "id" => "id",
            "no" => "nombre",
            "ca" => "categoria",
            "st" => "stock",
            "pr" => "precio"
        ];
        $campo = $todo[$filtro] ?? null;
//SWITCH PARA COMPROBAR EN FUNCION EL SELECCIONADO QUE LE DIMOS EN EL FORMULARIO, AL CUAL SE LE APLICARÁ LA FUNCION
        if ($campo) {
            switch ($funcion) {
                case "igu":
                        $productos_filtrados = filtrar_igual($productos_filtrados, $campo, $criterio);
                    break;
                case "con":
                    $productos_filtrados = filtrar_contiene($productos_filtrados, $campo, $criterio);
                    break;
                case "maq":
                    $productos_filtrados = filtrar_mayor($productos_filtrados, $campo, $criterio);
                    break;
                case "meq":
                    $productos_filtrados = filtrar_menor($productos_filtrados, $campo, $criterio);
                    break;
            }
        }
    }
    $productos_filtrados = array_values($productos_filtrados);
    $productos_filtrados = seleccionar_campos($productos_filtrados, $campos);

    echo "<h2>Productos filtrados</h2>";
    imprimirTabla($productos_filtrados);
    echo "<br><a href='../index.php'>Volver</a>";
}
?>