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
//FUNCION PARA MOSTRAR LOS CHECKBOX EN EL INDEX
function cajas($productos) {
    foreach (array_keys($productos[0]) as $caja) {  
        echo "<input type='checkbox' name='CampoASeleccionar[]' value='" . $caja ."'>" . ucfirst($caja);
    }
}
//FUNCION PARA HACER LA LISTA DE FILTRACION DE PRODUCTO
function lista($productos) {
        echo "<select name='filtroProducto'>";
        echo "<option value='sinCampo' selected>Sin campo</option>";
        foreach  (array_keys($productos[0]) as $listado) {  
        echo "<option value='$listado'>" . ucfirst($listado) . "</option>";
    }    
    echo "</select>";
    }


//AQUI COMPRUEBA QUE EL METODO DE PETICION ES POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $campos = $_POST["CampoASeleccionar"] ?? [];
    $filtro = $_POST["filtroProducto"];
    $funcion = $_POST["conOSinFiltrado"];
    $criterio = $_POST["criterio"];

    $productos_filtrados = $productos; 
//SI NO LE DAMOS NINGUN VALOR A NADA CREAMOS UN ARRAY ASOCIATIVO CON LAS CLAVES Y VALORES CON LAS QUE ASOCIAREMOS AL CAMPO
    if ($filtro != "sinCampo" && $funcion != "sinFiltrado" && $criterio !== "") {

        $todo = [
            "id" => "id",
            "nombre" => "nombre",
            "categoria" => "categoria",
            "stock" => "stock",
            "precio" => "precio"
        ];
        $campo = $todo[$filtro] ?? null;
//SWITCH PARA COMPROBAR EN FUNCION EL SELECCIONADO QUE LE DIMOS EN EL FORMULARIO, AL CUAL SE LE APLICARÁ LA FUNCION
        if ($campo) {
            switch ($funcion) {
                case "igual":
                        $productos_filtrados = filtrar_igual($productos_filtrados, $campo, $criterio);
                    break;
                case "contiene":
                    $productos_filtrados = filtrar_contiene($productos_filtrados, $campo, $criterio);
                    break;
                case "mayorQue":
                    $productos_filtrados = filtrar_mayor($productos_filtrados, $campo, $criterio);
                    break;
                case "menorQue":
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