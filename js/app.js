import {
    Alerta
} from './servicios.js';
const formulario = document.querySelector('#form-consulta');
const mensajeValidacion = document.querySelector('#mensaje');
const formMateria = document.querySelector('#formAgregarMateria');


formMateria.addEventListener('submit', (e) => {
    e.preventDefault();

    const datosMateria = new FormData(formMateria);
    const codigoMateria = datosMateria.get('codigoMateria');

    if (codigoMateria == 'Seleccionar') {
        mostrarMensajeMateria('Seleccione una materia', 'false');
    } else {
        agregarMateria();
    }
})

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
    fetch(`php/servicios.php?alumno=${codigo}`, {
            method: 'POST',
            body: datos,
        })
        .then(res => res.json())
        .then(data => {

            if (data == false) {

                Alerta('info', 'Ooops', `Alumno no encontrado`);
                removerTable()
            } else {
                let codigoAlumno = document.querySelector('#codigoAlumno');

                let codigo = data['codigo'];
                let nombres = data['nombre'];
                let apellidos = data['apellidos'];
                let fecha = data['fecha_nacimiento'];

                codigoAlumno.value = codigo;

                Alerta('success', 'Encontrado', `Alumno: ${nombres} ${apellidos}`)

                tablaAlumno(codigo, nombres, apellidos, fecha);


            }

        })
}

function agregarMateria() {
    const datosMaterias = new FormData(formMateria);
    let codigoAlumno = document.querySelector('#codigoAlumno').value;
    datosMaterias.append('codigoalumno', codigoAlumno);

    fetch(`php/agregar_materias.php`, {
            method: 'POST',
            body: datosMaterias,
        })
        .then(res => res.json())
        .then(data => {

            if (data == 'existe') {
                mostrarMensajeMateria('Registro existe', 'false');

            } else if (data == 'exito') {
                mostrarMensajeMateria('Registro éxitoso', 'true');
            } else {
                mostrarMensajeMateria('Error al guardar', 'false');
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

function tablaAlumno(codigo, nombres, apellidos, fecha) {
    const tabla = document.querySelector('#tablaAlum');
    tabla.innerHTML = `<table class="table">
    <thead>
      <tr>
        <th scope="col">Código Alumno</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Fecha nacimiento</th>
        <th scope="col"> Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">${codigo}</th>
        <td>${nombres}</td>
        <td>${apellidos}</td>
        <td>${fecha}</td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMateria">
        Materias
      </button></td>
      </tr>
   
    </tbody>
  </table>`;
}

function removerTable() {
    const tabla = document.querySelector('#tablaAlum');
    tabla.innerHTML = '';
}

function mostrarMensajeMateria(mensaje, tipo) {
    const mensajeAddMateria = document.querySelector('#mensajeMateria');

    if (tipo == 'true') {

        mensajeAddMateria.innerHTML = `<div class='alert alert-success' role='alert'>
        <p> ${mensaje} </p> 
     </div>`;

    } else {
        mensajeAddMateria.innerHTML = `<div class='alert alert-danger' role='alert'>
        <p> ${mensaje} </p> 
     </div>`;
    }

    setTimeout(() => {
        mensajeAddMateria.innerHTML = '';
    }, 2000);
}