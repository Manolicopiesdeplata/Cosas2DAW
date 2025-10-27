<?php
require_once("catalogo_productos.php");

function filtrar_igual($productos, $campo, $valor) {
    $res = array_filter($productos, function($producto) use ($campo, $valor) {
        return isset($producto[$campo]) && $producto[$campo] == $valor;
    });
    return array_values($res);
}

function filtrar_mayor($productos, $campo, $valor) {
    $res = array_filter($productos, function($producto) use ($campo, $valor) {
        return isset($producto[$campo]) && floatval($producto[$campo]) > floatval($valor);
    });
    return array_values($res);
}

function filtrar_menor($productos, $campo, $valor) {
    $res = array_filter($productos, function($producto) use ($campo, $valor) {
        return isset($producto[$campo]) && floatval($producto[$campo]) < floatval($valor);
    });
    return array_values($res);
}

function filtrar_contiene($productos, $campo, $valor) {
    $res = array_filter($productos, function($producto) use ($campo, $valor) {
        return isset($producto[$campo]) && stripos($producto[$campo], $valor) !== false;
    });
    return array_values($res);
}

function seleccionar_campos($productos, $campos) {
    if (empty($campos) || in_array('*', $campos)) {
        return $productos;
    }

    return array_map(function($producto) use ($campos) {
        return array_intersect_key($producto, array_flip($campos));
    }, $productos);
}

function imprimirTabla($productos) {
    echo "<table border='1px' collapse><tr>";
    foreach (array_keys($productos[0]) as $nombreCampo) {
        echo "<th>" . ($nombreCampo) . "</th>";
    }
    echo "</tr>";

    foreach ($productos as $producto) {
        echo "<tr>";
        foreach ($producto as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $campos = $_POST["CampoASeleccionar"];
    $filtro = $_POST["filtroProducto"];
    $funcion = $_POST["conSin"];
    $criterio = $_POST["criterio"];

    $productos_filtrados = $productos; 

    // Si estamos filtrando
    if ($filtro != "sc" && $funcion != "sin" && $criterio !== "") {

        $mapa = [
            "id" => "id",
            "no" => "nombre",
            "ca" => "categoria",
            "st" => "stock",
            "pr" => "precio"
        ];
        $campo = $mapa[$filtro];

        if ($campo) {
            switch ($funcion) {
                case "igu":
                        $productos_filtrados = filtrar_igual($productos, $campo, $criterio);
                    break;
                case "con":
                    $productos_filtrados = filtrar_contiene($productos, $campo, $criterio);
                    break;
                case "maq":
                    $productos_filtrados = filtrar_mayor($productos, $campo, $criterio);
                    break;
                case "meq":
                    $productos_filtrados = filtrar_menor($productos, $campo, $criterio);
                    break;
            }
        }
    }

    $productos_filtrados = seleccionar_campos($productos_filtrados, $campos);

    // Mostrar tabla
    echo "<h2>Productos filtrados</h2>";
    imprimirTabla($productos_filtrados);
    echo "<br><a href='../index.php'>Volver</a>";
}
?>