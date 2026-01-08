<?php
    const CREATE_USUARIOS_TABLE = 
        'CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nickname TEXT,
            email TEXT,
            password TEXT,
            UNIQUE(nickname),
            UNIQUE(email)
        )';

    const CREATE_CATEGORIAS_TABLE = 
        'CREATE TABLE IF NOT EXISTS categorias (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT,
            descripcion TEXT,
            UNIQUE(nombre)
        )';

    const CREATE_GANGAS_TABLE = 
        'CREATE TABLE IF NOT EXISTS gangas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo TEXT,
            descripcion TEXT,
            precio REAL
        )';

    const CREATE_GANGA_HAS_CATEGORIA_TABLE = 
        'CREATE TABLE IF NOT EXISTS ganga_has_categoria (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ganga_id INTEGER,
            categoria_id INTEGER,
            UNIQUE(ganga_id, categoria_id),
            FOREIGN KEY(ganga_id) REFERENCES gangas(id),
            FOREIGN KEY(categoria_id) REFERENCES categorias(id)
        )';
    
    const CREATE_USUARIO_LIKES_TABLE = 
        'CREATE TABLE IF NOT EXISTS usuario_likes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            usuario_id INTEGER,
            ganga_id INTEGER,
            UNIQUE(usuario_id, ganga_id),
            FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
            FOREIGN KEY(ganga_id) REFERENCES gangas(id)
        )';

    const OBTENER_TODAS_LAS_GANGAS =
        'SELECT * FROM gangas';
        
    const OBTENER_TODAS_LAS_CATEGORIAS =
        'SELECT * FROM categorias';

    const OBTENER_CATEGORIAS_POR_GANGA_ID =
        'SELECT c.* FROM categorias c
         JOIN ganga_has_categoria gc ON c.id = gc.categoria_id
         WHERE gc.ganga_id = :ganga_id';

    const OBTENER_NUMERO_DE_LIKES_POR_GANGA_ID =
        'SELECT COUNT(*) as like_count FROM usuario_likes
         WHERE ganga_id = :ganga_id';

    const OBTENER_NUMERO_DE_GANGAS_POR_CATEGORIA_ID =
        'SELECT COUNT(*) as n_gangas FROM ganga_has_categoria
         WHERE categoria_id = :categoria_id';

    const INSERTAR_USUARIO =
        'INSERT INTO usuarios (nickname, email, password) VALUES (:nickname, :email, :password)';

    const USUARIO_DA_LIKE_A_GANGA =
        'INSERT OR IGNORE INTO usuario_likes (usuario_id, ganga_id) VALUES (:usuario_id, :ganga_id)';

    const USUARIO_DA_DISLIKE_A_GANGA =
        'DELETE FROM usuario_likes WHERE usuario_id = :usuario_id AND ganga_id = :ganga_id';

    const USUARIO_HA_LIKEADO_GANGA =
        'SELECT COUNT(*)>0 as has_liked FROM usuario_likes
         WHERE usuario_id = :usuario_id AND ganga_id = :ganga_id';

    const OBTENER_CATEGORIA_POR_ID = 
        'SELECT * FROM categorias WHERE id = :id';

    const OBTENER_GANGAS_POR_CATEGORIA_ID =
        'SELECT g.* FROM gangas g
         JOIN ganga_has_categoria gc ON g.id = gc.ganga_id
         WHERE gc.categoria_id = :categoria_id';

    const OBTENER_USUARIO_POR_EMAIL = 
        'SELECT * FROM usuarios WHERE email = :email';
    const SEEDER = 
        'INSERT OR IGNORE INTO usuarios (nickname, email, password) VALUES
            ("Mr Gangas", "test@test.com", "$2y$12$4hi76OJ.7xUxHPJ6sR9jx.5JU1q1PAzIAgRDm/aZb0fdJsIcSWGBW");
        INSERT OR IGNORE INTO categorias (nombre, descripcion) VALUES
            ("Cocina", "Electrodomésticos y utensilios de cocina"),
            ("Electrónica", "Dispositivos electrónicos y gadgets"),
            ("Hogar", "Artículos para el hogar y decoración"),
            ("Videojuegos", "Consolas, juegos y accesorios de videojuegos"),
            ("Mascotas", "Productos para el cuidado y bienestar de las mascotas");
        INSERT OR IGNORE INTO gangas (titulo, descripcion, precio) VALUES
            ("Horno multifunción Serie 5000 SurroundCook con SteamBake con Display LED Explore", "Muy buen precio aplicando los dos cupones de descuento (CHOLLOV5PBA521AB + FELICIDADES-AEG) con envío gratuito para este Horno multifunción Serie 5000 SurroundCook con SteamBake y Display LED Explore.", 313.00),
            ("EZVIZ DL01S Cerradura Inteligente WiFi 4/5 10", "La EZVIZ DL01S es una cerradura inteligente sin llave que se controla desde la app de EZVIZ y se comunica por Zigbee, requiriendo puerta de enlace A3 para avisos remotos. Ofrece gestión de accesos con permisos permanentes o temporales, bloqueo automático con sensor, notificaciones, modo privacidad y alertas de batería; funciona con 4 pilas AA.", 64.99),
            ("Google Pixel 10 - 128gb", "Google Pixel 10 - Smartphone Android Libre con Gemini, cámara Trasera Triple Avanzada, batería de más de 24 Horas y Pantalla Actua de 6,3 pulgadas - Obsidiana, 128GB", 535.54),
            ("GRATIS :: Wild Terra 2: New Lands | STEAM | 16 Diciembre", "Los desarrolladores anuncian: Del 16 al 18 de diciembre puedes reclamar Wild Terra 2: New Lands GRATIS — o sea que te lo quedas para siempre", 0.00),
            ("Dispensador automático programable para perros y gatos", "Dispensador automático de pienso para perros y gatos con dos litros de capacidad y programable en porciones y cada cuanto tiempo se dispensa. Con una capacidad de 2 litros, apto para pienso desde 2 a 15mm de grosor y con un diseño discreto y funcional. Fácilmente configurable desde su pantalla LCD, con alimentación mediante enchufe y pilas de respaldo por si hubiese corte de energía", 15.54);
        INSERT OR IGNORE INTO ganga_has_categoria (ganga_id, categoria_id) VALUES
            (1, 1),
            (2, 2),
            (2, 3),
            (3, 2),
            (4, 4),
            (5, 2),
            (5, 3),
            (5, 5);';
?>
