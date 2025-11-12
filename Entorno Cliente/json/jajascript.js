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

  /*num.addEventListener('keydown', aceptar) {
    switch(aceptar) {
      case 'Enter':
        empezar();
    }
  }*/

  function empezar() {
    fetch("https://servicios.ine.es/wstempus/js/ES/DATOS_TABLA/50902?nult=5")
      .then((response) => response.json())
      .then(function (data) {
        objeto = data[num.value - 1];

        let tablica = document.createElement("table");
        let tablody = document.createElement("tbody");
        
          let hilera = document.createElement("tr");

          for (let prop in objeto) {
            if (objeto[prop] instanceof Array) {
              for(otroObj of objeto[prop]) {
                for(subDato in otroObj) {
                  let celda = document.createElement('td');
                  celda.innerHTML=`${subDato}: ${otroObj[subDato]}`;
                  hilera.appendChild(celda);
                }
              }
            } else {
              let celda = document.createElement("td");
              celda.innerHTML = `${prop}: ${objeto[prop]}`;
              hilera.appendChild(celda);
            }
          }

          let botoncito = document.createElement('button');
          botoncito.innerHTML = '<button type="submit">ponerlo en negrita</button>';
          hilera.appendChild(botoncito);
          botoncito.addEventListener('click', ()=>{
            tablica.style.fontWeight = 'bolder';
          });

          let botoncito2 = document.createElement('button');
          botoncito2.innerHTML = '<button type="submit">quitar la negrita</button>';
          hilera.appendChild(botoncito2);
          botoncito2.addEventListener('click', ()=>{
            tablica.style.fontWeight = 'lighter';
          });
          

          tablody.appendChild(hilera);
          tablica.appendChild(tablody);
          tablica.setAttribute("border", "2");
          datos.innerHTML = "";
          datos.appendChild(tablica);
      });
  }
  num.focus();
});
