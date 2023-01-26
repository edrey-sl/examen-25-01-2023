import {
    Alerta
} from './servicios.js';
const formulario = document.querySelector('#form-consulta');
const mensajeValidacion = document.querySelector('#mensaje');


formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const datos = new FormData(formulario);
    const codigo = datos.get('codigo');

    if (codigo.length == 0) {
        mostrarMensaje('Campo vacio', 'false');
    } else if (codigo.length != 4) {

        mostrarMensaje('Codigo debe ser de 4 caracteres', 'false');

    } else if (numeros(codigo) == false) {
        mostrarMensaje('Solo se aceptan numeros', 'false');
    } else {
        buscar(codigo);
    }

})


function buscar(codigo) {

    const datos = new FormData(formulario);
    fetch(`php/servicios.php?codigo=${codigo}`, {
            method: 'POST',
            body: datos,
        })
        .then(res => res.json())
        .then(data => {

            if (data == "error") {

                Alerta('info', 'Ooops', `Alumno no encontrado`);
                hide();
                removerTable();
            } else {

                removerTable();
                show();

                Alerta('success', 'Éxito', `Alumno encontrado`)

                tablaAlumno(data)

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




function numeros(dato_a_comprobar) {
    var expReg = /^[0-9]+$/;

    if (dato_a_comprobar.match(expReg)) {
        return true;

    } else {
        return false;
    }
}

function tablaAlumno(arreglo) {
    const tabla = document.querySelector('#tablaAlum');

    let valor = Object.values(arreglo);
    for (let i = 0; i < valor.length; i++) {

        tabla.innerHTML += `

        <tr">
      <th scope="row">${valor[i]['codigoAlumno']}</th>
      <td>${valor[i]['nombre']}</td>
      <td>${valor[i]['apellidos']}</td>
      <td>${valor[i]['nacimiento']}</td>
      <td>${valor[i]['codigoMateria']}</td>
      <td>${valor[i]['nombreMateria']}</td>
      <td>${valor[i]['calificacion']}</td>
      <td><a href="php/eliminar.php?idAlumno=${valor[i]['codigoAlumno']}&idMateria=${valor[i]['codigoMateria']}"  class="btn btn-danger">Eliminar</a></td>
     
    </tr>`;


    }

}

function removerTable() {
    const tabla = document.querySelector('#tablaAlum');
    tabla.innerHTML = '';
}


function hide() {
    let table = document.querySelector('#tabla-inscritas');
    table.classList.add('hide');

}

function show() {
    let table = document.querySelector('#tabla-inscritas');
    table.classList.remove('hide');
}