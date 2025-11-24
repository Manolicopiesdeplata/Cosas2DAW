window.addEventListener('load', () => {
    const boton = document.getElementById("ver-mas-boton");
    const frases = document.getElementById("frase-increible");
    let frasesIncreibles = [];

    function cargarFrases() {
        fetch('Frases.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la carga del archivo JSON: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                frasesIncreibles = data;
                boton.addEventListener("click", cambiarFrases);
            })
            .catch(error => {
                console.error("Error al cargar frases:", error);
                frases.textContent = "No hay frasecicas pa ti.";
            });
    }

    function cambiarFrases() {
        if (frasesIncreibles.length === 0) {
            frases.textContent = "Preparate que se viene...";
            return;
        }
        const indice = Math.floor(Math.random() * frasesIncreibles.length);
        frases.textContent = frasesIncreibles[indice];
    }
    cargarFrases();
});