<?php
    $articulos = [
        'deportes' => 'Janja Garnet gana (otra vez) el campeonato mundial en boulder y lead',
        'tecnologia' => '1X Technologies presenta su robot de limpieza doméstica',
        'cocina' => '¿Proteína animal? Aquí tienes las 10 mejores alternativas vegetales'
    ];

    $categoria_actual = $_GET['categoria'] ?? 'general';
?>

<!DOCTYPE html>
<html>
<head><title>Artículo de <?= $categoria_actual; ?></title></head>
<body style="font-family: sans-serif;">

    <h1 style="text-transform: capitalize;"><?= $categoria_actual; ?></h1>
    
    <p><?= $articulos[$categoria_actual] ?? 'Contenido del artículo.'; ?></p>
    
    <hr>
    <a href="index.php">Volver a la portada</a>
    
    <h3>Cookie 'perfil_intereses'</h3>
    <p style="word-break: break-all;">Aún no sabemos nada de ti</p> <!-- esto hay que rellenarlo -->
</body>
</html>