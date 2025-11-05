addEventListener('load', () => {
    let caja = document.getElementById("box");
    let boton = document.getElementById("toggleBtn");
    boton.addEventListener('mousedown', toggleBox);

    function toggleBox() {
        if (caja.style.display === "block") {
            caja.style.display = "none";
            boton.textContent = "Mostrar Caja";
        } else {
            caja.style.display = "block";
            boton.textContent = "Ocultar Caja";
        }


    }
})