window.addEventListener("load", () => {
  let contenedor = document.getElementById("contenedor");
  let form = document.getElementById("form");

  let tabla = document.createElement("table");
  let thead = document.createElement("thead");
  let tr = document.createElement("tr");

  let cabeceras = ["Nombre", "Edad", "Correo", "DNI"];

  cabeceras.forEach((cabecera) => {
    let th = document.createElement("th");
    th.textContent = cabecera;
    tr.appendChild(th);
  });

  thead.appendChild(tr);
  tabla.appendChild(thead);
  let tbody = document.createElement("tbody");
  tabla.appendChild(tbody);

  form.innerHTML = `<form>
            <p>nombre: <input type="text" id="nombre" required></p>
            <p>edad: <input type="number" id="edad" required></p>
            <p>correo: <input type="email" id="correo" required></p>
            <p>dni: <input type="text" id="dni" required></p>
            <button type="submit" id="crear">Crear Usuario</button>
            </form>`;
  let crear = document.getElementById("crear");

  //FUNCION PARA MOSTRAR USUARIOS EN TABLA
  function mostrarTabla() {
    fetch("http://localhost:3000/usuarios")
      .then((response) => response.json())
      .then((usuarios) => {
        usuarios.forEach((usuario) => {
          let fila = document.createElement("tr");
          fila.innerHTML = `
                        <td>${usuario.nombre}</td>
                        <td>${usuario.edad}</td>
                        <td>${usuario.correo}</td>
                        <td>${usuario.dni}</td>
                        <td><button class="eliminar" data-id="${usuario.id}">Eliminar</button></td>`;
          tbody.appendChild(fila);

          let eliminar = document.querySelectorAll(".eliminar");
          eliminar.forEach(boton => {
            boton.addEventListener("click", () => {
              let id = boton.getAttribute("data-id");
              eliminarUsuario(id);
            })
          })
        });
      })
      .catch((error) => console.error("Error:", error));
  }
  contenedor.appendChild(tabla);
  //FUNCION PARA CREAR USUARIOS
  function crearUsuario() {
    let nombre = document.getElementById("nombre").value;
    let edad = document.getElementById("edad").value;
    let correo = document.getElementById("correo").value;
    let dni = document.getElementById("dni").value;
    let nuevoUsuario = {
      nombre: nombre,
      edad: edad,
      correo: correo,
      dni: dni,
    };

    fetch("http://localhost:3000/usuarios", {
      method: "POST",
      body: JSON.stringify(nuevoUsuario),
    })
      .then((response) => response.json())
      .catch((error) => {
        console.error("no se ha podido crear");
      });
  }
  function eliminarUsuario(id) {
    fetch(`http://localhost:3000/usuarios/${id}`, {
      method: "DELETE",
      body: JSON.stringify(id)
    })
    .then(response => response.json())
    .catch(error => {
      console.error('no se puede eliminar')
    });
  }
  
  mostrarTabla();
  crear.addEventListener("click", crearUsuario);
});