<?php

$paises =  [
        [
            "nombre"=> "España",
            "continente"=> "Europa"
        ],
        [
            "nombre"=> "Paises Bajos",
            "continente"=> "Europa"
        ],
        [
            "nombre"=> "China",
            "continente"=> "Asia"
        ],
        [
            "nombre"=> "Estados Unidos",
            "continente" => "America",
        ],
        [
            "nombre"=> "Marruecos",
            "continente" => "Africa"
        ]
    ];
    $paises_europeos = array_filter($paises, fn($pais) =>  $pais["continente"] == "Europa");
    echo "<pre>", print_r($paises_europeos), "</pre>";