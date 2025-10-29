let editando = false;



function transformarEnEditable(nodo) {

  //El nodo recibido es SPAN

  if (editando == false) {

    let nodoTd = nodo.parentNode; //Nodo TD

    let nodoTr = nodoTd.parentNode; //Nodo TR

    let nodoContenedorForm = document.getElementById('contenedorForm'); //Nodo DIV

    let nodosEnTr = nodoTr.getElementsByTagName('td');

    let alimento = nodosEnTr[0].textContent; let calorias = nodosEnTr[1].textContent;

    let grasas = nodosEnTr[2].textContent; let proteina = nodosEnTr[3].textContent;

    let carbohidratos = nodosEnTr[4].textContent; let opciones = nodosEnTr[5].textContent;

    let nuevoCodigoHtml = '<td><input type="text" name="alimento" id="alimento" value="' + alimento + '" size="10"></td>' +

      '<td><input type="text" name="calorias" id="calorias" value="' + calorias + '" size="5"></td>' +

      '<td><input type="text" name="grasas" id="grasas" value="' + grasas + '" size="5"></td>' +

      '<td><input type="text" name="proteina" id="proteina" value="' + proteina + '" size="5"></td>' +

      '<td><input type="text" name="carbohidratos" id="carbohidratos" value="' + carbohidratos + '" size="5"></td> <td>En edición</td>';



    nodoTr.innerHTML = nuevoCodigoHtml;



    nodoContenedorForm.innerHTML = 'Pulse Aceptar para guardar los cambios o cancelar para anularlos' +

      '<form name = "formulario" onsubmit=" return capturarEnvio()" onreset="anular()">' +

      '<input class="boton" type = "submit" value="Aceptar"> <input class="boton" type="reset" value="Cancelar">';

    editando = true;
  }

  else {
    alert('Solo se puede editar una línea. Recargue la página para poder editar otra');

  }

}



function capturarEnvio() {
  let alimento = document.querySelector('#alimento').value;
  let calorias = document.querySelector('#calorias').value;
  let grasas = document.querySelector('#grasas').value;
  let proteina = document.querySelector('#proteina').value;
  let carbohidratos = document.querySelector('#carbohidratos').value;

  let fila = document.querySelector('td input')?.closest('tr');

  fila.innerHTML =
    "<td>" + alimento + "</td>" +
    "<td>" + calorias + "</td>" +
    "<td>" + grasas + "</td>" +
    "<td>" + proteina + "</td>" +
    "<td>" + carbohidratos + "</td>" +
    '<td><span class="editar" onclick="transformarEnEditable(this)">Editar</span></td>';

  document.getElementById('contenedorForm').innerHTML = "";

  editando = false;

  return false;
}



function anular() {

  window.location.reload();

}