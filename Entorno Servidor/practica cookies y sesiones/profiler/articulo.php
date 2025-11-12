<?php
    $articulos = [
        'deportes' => 'Janja Garnet gana (otra vez) el campeonato mundial en boulder y lead',
        'tecnologia' => '1X Technologies presenta su robot de limpieza doméstica',
        'cocina' => '¿Proteína animal? Aquí tienes las 10 mejores alternativas vegetales'
    ];

    $categoria_actual = $_GET['categoria'] ?? 'general';

    $intereses_guardados = isset($_COOKIE['profiler']) ? json_decode($_COOKIE['profiler'], true) : [];

    $intereses_guardados[$categoria_actual] = isset($intereses_guardados[$categoria_actual]) ? $intereses_guardados[$categoria_actual]+1 : 1;

    setcookie('profiler', json_encode($intereses_guardados), time() + 3600 * 24 * 7);
?>

<!DOCTYPE html>
<html>
<head><title>Artículo de <?= $categoria_actual; ?></title></head>
<body style="font-family: sans-serif;">

    <h1 style="text-transform: capitalize;"><?= $categoria_actual; ?></h1>
    
    <p><?= $articulos[$categoria_actual] ?? 'Contenido del artículo.'; ?></p>
    
    <hr>
    <a href="index.php">Volver a la portada</a>
</body>
</html>