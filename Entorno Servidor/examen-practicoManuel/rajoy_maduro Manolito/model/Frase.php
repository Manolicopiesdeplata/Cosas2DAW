<?php

    class Frase {
        private $id;
        private $texto;
        private $autor;

        public function __construct($id, $texto, $autor) {
            $this->id = $id;
            $this->texto = $texto;
            $this->autor = $autor;
        }

        public function getId() {
            return $this->id;
        }

        public function getTexto() {
            return $this->texto;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setTexto($texto) {
            $this->texto = $texto;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        public static function _xmlElementToInstance($xml) {
            $id = (int) $xml['id'];
            $texto = $xml;
            $autor = $xml['autor'];
            return new Frase($id, $texto, $autor);
        }

        public static function all() {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            $frases = [];
            foreach ($frases_xml->frase as $frase_xml) {
                $frases[] = self::_xmlElementToInstance($frase_xml);
            }
            return $frases;
        }

        public static function byId($id) {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            if ($id < 1 || $id > count($frases_xml->frase)) {
                return null;
            }

            $frase_xml = $frases_xml->xpath("frase[@id='$id']")[0];
            $frase = self::_xmlElementToInstance($frase_xml);
            return $frase;
        }

        public static function byAutor($autor) {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            $frases_autor = $frases_xml->xpath("frase[@autor='$autor']");
            $frases = [];
            foreach ($frases_autor as $frase_xml) {
                $frases[] = self::_xmlElementToInstance($frase_xml);
            }
            return $frases;
        }
        public static function byTexto($texto) {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            $frases_encontradas = $frases_xml->xpath("frase[contains(., '$texto')]");
            $frases = [];
            foreach ($frases_encontradas as $frase_xml) {
                $frases[] = self::_xmlElementToInstance($frase_xml);
            }
            return $frases;
        }
        public static function random() {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            $random = rand(1, count($frases_xml->frase));
            $frase = self::byId($random);
            return $frase;
        }
        public static function count() {
            $frases_xml = simplexml_load_file(__DIR__ .'/../data/frases.xml');
            $contado = count($frases_xml->frase);
            return $contado;
        }
    }

?>