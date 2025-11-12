<?php
    $intereses_guardados = isset($_COOKIE['profiler']) ? json_decode($_COOKIE['profiler'], true) : [];
    $categoria_favorita = null;
    $recomendacion = "Navega por la web para ver recomendaciones";

    if (!empty($intereses_guardados)) {
        arsort($intereses_guardados);
        $categoria_favorita = key($intereses_guardados);
        if ($categoria_favorita) {
            $recomendacion = "Vemos que te interesa mucho la categoría de <strong>$categoria_favorita</strong>. ¡Aquí tienes más!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head><title>Portal de Noticias</title></head>
<body style="font-family: sans-serif;">

    <h1>Nuestro Portal</h1>
    
    <div style="background: #eee; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h3>Recomendado para ti</h3>
        <p><?= $recomendacion; ?></p>
        <?php if ($categoria_favorita): ?>
            <a href="articulo.php?categoria=<?= $categoria_favorita; ?>">
                Ver más de <?= $categoria_favorita; ?>
            </a>
        <?php endif; ?>
    </div>
    
    <h2>Artículos Disponibles</h2>
    <ul>
        <li><a href="articulo.php?categoria=deportes">Artículo de Deportes</a></li>
        <li><a href="articulo.php?categoria=tecnologia">Artículo de Tecnología</a></li>
        <li><a href="articulo.php?categoria=cocina">Artículo de Cocina</a></li>
    </ul>

    <hr>

    <h3>Cookie 'perfil_intereses'</h3>
    <p style="word-break: break-all;"><?= htmlspecialchars($_COOKIE['profiler'] ?? ''); ?></p>
    <a href="reset.php">(Borrar mi perfil de intereses)</a>
</body>
</html>