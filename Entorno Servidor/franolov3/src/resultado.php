<?php
require_once __DIR__ . ("/funciones.php");
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

    
    echo "<head><link rel=stylesheet href='estilos.css'></head><body>";
    echo "<h2>Productos filtrados</h2>";
    imprimirTabla($productos_filtrados);
    echo "<br><a href='index.php'>Volver</a>";
    echo "</body>";
}
?>