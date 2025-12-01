#!/bin/bash

echo "-------------------------------------"
echo "  COPIA DE SEGURIDAD DE LA EMPRESA"
echo "-------------------------------------"
echo "1. Copia de seguridad LOCAL"
echo "2. Copia de seguridad en RED"
read -p "Seleccione una opción (1 o 2): " opcion

# Variables
FECHA=$(date +%Y-%m-%d_%H-%M-%S)
ARCHIVO="backup_$FECHA.tar.gz"

case $opcion in
  1)
    read -p "RUTA ORIGEN: " origen
    read -p "DESTINO: " destino
    echo "Creando archivo de copia de seguridad..."
    mkdir -p "$destino"
    tar -czf "$destino/$ARCHIVO" -C "$origen" .
    echo "Archivo comprimido creado: $DESTINO_LOCAL/$ARCHIVO"
    ;;

  2)
    read -p "Usuario remoto: " usuario
    read -p "Servidor remoto (IP o nombre): " servidor
    read -p "Ruta remota destino: " ruta_remota

    echo "Creando archivo de copia de seguridad temporal..."
    tar -czf "/tmp/$ARCHIVO" -C "$ORIGEN" .

    echo "Enviando copia de seguridad al servidor remoto..."
    rsync -avhz --progress "/tmp/$ARCHIVO" "$usuario@$servidor:$ruta_remota/"

    echo "Copia remota completada: $usuario@$servidor:$ruta_remota/$ARCHIVO"
    
    # Elimina el archivo temporal
    rm -f "/tmp/$ARCHIVO"
    ;;

  *)
    echo "ERROR:Opción no válida. Intente de nuevo."
    ;;
esac