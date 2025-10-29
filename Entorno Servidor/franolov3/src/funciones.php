<?php
require_once __DIR__ . ("/catalogo_productos.php");

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
  return array_filter($productos, fn($producto) =>  str_contains($producto[$campo], $valor));
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
   echo "<table><tr>";
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
?>