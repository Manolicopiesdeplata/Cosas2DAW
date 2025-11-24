async function generarTabla(params) {
    let contenedor = document.getElementById('contenedor');

    let respuesta = await fetch('http://localhost:3000/usuarios');

    let usuarios = await respuesta.json();

    let tabla = document.createElement('table');
    let thead = document.createElement('thead');
    let tr = document.createElement('tr');

    let nombres = ['Nombre', 'Edad', 'Correo', 'DNI'];

    nombres.forEach(texto =>{
        let th = document.createElement('th');
        th.textContent = texto;
        tr.appendChild(th);
    });

    thead.appendChild(tr);
    tabla.appendChild(thead);
    let tbody = document.createElement('tbody');
    usuarios.forEach(usuario => {
        let fila = document.createElement('tr');
        fila.innerHTML =  
        '<td>' + usuario.nombre + '</td>' +
        '<td>' + usuario.edad + '</td>' +
        '<td>' + usuario.correo + '</td>' +
        '<td>' + usuario.dni + '<td>';
        tbody.appendChild(fila);
    });

    tabla.appendChild(tbody);
    contenedor.appendChild(tabla);

}
generarTabla();