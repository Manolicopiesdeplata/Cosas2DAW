window.addEventListener("load", () => {
  let datos = document.getElementById("datos");
  let modal = document.createElement("dialog");
  modal.innerHTML =
    '<h3>Ponme el numero del ine a mostrar: <input type="number" id="num" value="0" /></h3>' +
    '<br><button type="submit" id="aceptar">Enviar</button>';
  datos.appendChild(modal);
  modal.setAttribute("open", "open");
  let aceptar = document.getElementById("aceptar");
  aceptar.addEventListener("click", empezar);
  let num = document.getElementById("num");

  function empezar() {
    fetch("https://servicios.ine.es/wstempus/js/ES/DATOS_TABLA/50902?nult=5")
      .then((response) => response.json())
      .then(function (data) {
        objeto = data[num.value - 1];

        let tablica = document.createElement("table");
        let tablody = document.createElement("tbody");
        for (let i = 0; i < 1; i++) {
          let hilera = document.createElement("tr");
          for (let prop in objeto) {
            if (objeto[prop] instanceof Array) {
              alert("si");
            } else {
              let celda = document.createElement("td");
              celda.innerHTML = `${prop}: ${objeto[prop]}`;
              hilera.appendChild(celda);
            }
          }
          tablody.appendChild(hilera);
        }
        tablica.appendChild(tablody);
        tablica.setAttribute("border", "2");
        datos.innerHTML = "";
        datos.appendChild(tablica);
      });
  }
});
