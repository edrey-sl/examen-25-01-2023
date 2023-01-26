import {
    Alerta
} from './servicios.js';
const formulario = document.querySelector('#form-consulta-materia');
const mensajeValidacion = document.querySelector('#mensaje');


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const datos = new FormData(formulario);
    const codigo = datos.get('codigo');

    if (codigo.length == 0) {
        mostrarMensaje('Campo vacio', 'false');
    } else if (codigo.length != 5) {

        mostrarMensaje('Codigo debe ser de 5 caracteres', 'false');

    } else {
        buscar(codigo);
    }

})

function buscar(codigo) {

    const datos = new FormData(formulario);
    fetch(`php/servicios.php?materias=${codigo}`, {
            method: 'POST',
            body: datos,
        })
        .then(res => res.json())
        .then(data => {

            if (data == false) {

                Alerta('info', 'Ooops', `Materia no encontrada`);
                removerTable()
            } else {

                let codigo = data['codigoMateria'];
                let nombre = data['nombre'];


                Alerta('success', 'Encontrado', `Materia: ${nombre}`)

                tablaMaterias(codigo, nombre);
            }

        })
}




function mostrarMensaje(mensaje, tipo) {
    if (tipo == 'true') {

        mensajeValidacion.innerHTML = `<div class='alert alert-success' role='alert'>
        <p> ${mensaje} </p> 
     </div>`;

    } else {
        mensajeValidacion.innerHTML = `<div class='alert alert-danger' role='alert'>
        <p> ${mensaje} </p> 
     </div>`;

    }

    setTimeout(() => {
        mensajeValidacion.innerHTML = '';
    }, 2000);
}



function tablaMaterias(codigo, nombre) {
    const tabla = document.querySelector('#tablaMateria');
    tabla.innerHTML = `<table class="table">
    <thead>
      <tr>
        <th scope="col">Código Materia</th>
        <th scope="col">Nombre</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">${codigo}</th>
        <td>${nombre}</td>
       
      </tr>
   
    </tbody>
  </table>`;
}


function removerTable() {
    const tabla = document.querySelector('#tablaMateria');
    tabla.innerHTML = '';
}