window.addEventListener('load', () => {
    // Seleccionar elementos del DOM
    const newTaskInput = document.getElementById('newTaskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');

    // Función para agregar una nueva tarea
    function addTask() {
        const tarea = newTaskInput.value;
        if (tarea) {
            const lista = document.createElement('li');
            lista.textContent = tarea;
            const borrar = document.createElement('button');
            borrar.textContent = 'X';
            borrar.addEventListener('click', () =>{
                lista.remove();
            });

            borrar.classList.add('deleteBtn');
            lista.appendChild(borrar);

            taskList.appendChild(lista);
            newTaskInput.value = '';
        }
    }
    // Agregar evento al botón de agregar tarea
    addTaskBtn.addEventListener('click', addTask);
})