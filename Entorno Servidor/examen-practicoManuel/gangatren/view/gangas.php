<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gangas</title>
        <link rel="stylesheet" href="gangatren.css">
    </head>
    <body>
        <header>
            <span style="flex: 1"></span>
            <h1>Bienvenido, <?= htmlspecialchars($usuario->getNickname()); ?></h1>
            <a href="index.php?page=logout">Cerrar sesión</a>
        </header>
        <main id="deals-container">
            <a href="index.php?page=categorias">Ver todas las categorias</a>
            <h2>Lista de Gangas <?= isset($categoria) ? 'en ' . htmlspecialchars($categoria->getNombre()) : ''; ?> (<?= count($gangas); ?>)</h2>
            <?php if (isset($categoria)) : ?>
                <p><a href="index.php">Limpiar filtro</a></p>
            <?php endif; ?>
            <?php foreach ($gangas as $ganga): ?>
                <?php
                    $categorias = $ganga->categorias();

                    $ganga_likes = $ganga->likes();

                    $has_liked = $usuario->hasLike($ganga->getId());
                ?>
                <article class="ganga">
                    <strong><?= htmlspecialchars($ganga->getTitulo()); ?></strong> (<?= $ganga_likes; ?>)
                    <form id="like-form" method="POST" action="<?="index.php?page=likeDislike"?>"  style="display:inline;">
                        <input type="hidden" name="ganga_id" value="<?= $ganga->getId(); ?>">
                        <?php if ($has_liked): ?>
                            <button type="submit" name="action" value="dislike">&#129035;</button>
                        <?php else: ?>
                            <button type="submit" name="action" value="like">&#129033;</button>
                        <?php endif; ?>
                    </form>
                    
                    <br>
                    <hr>
                    <p><?= htmlspecialchars($ganga->getDescripcion()); ?></p>
                    <p><strong>Precio:</strong> <?= htmlspecialchars($ganga->getPrecio()); ?>€</p>
                    <p>Categorías:
                        <?php foreach ($categorias as $categoria): ?>
                            <span class="categoria"><a href="index.php?page=gangas&categoria_id=<?= htmlspecialchars($categoria->getId()); ?>" title="<?= htmlspecialchars($categoria->getDescripcion()) ?>"><?= '#' . htmlspecialchars($categoria->getNombre()) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </main>
    </body>
</html>