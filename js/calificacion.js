import { Alerta } from './servicios.js';
const formulario = document.querySelector('#form-calf');
const mensajeValidacion = document.querySelector('#mensaje');
const InpCalf = document.querySelector('#calf');


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
        update();
    }

})

function update() {

    const datos = new FormData(formulario);
    fetch(`php/updatecalf.php`, {
            method: 'POST',
            body: datos,
        })
        .then(res => res.json())
        .then(data => {

            if (data == 'error') {
                Alerta('error', 'error', `No se pudo asignar calificación`);
                removerTable()
            } else if (data == 'noexiste') {

                Alerta('info', 'Ooops', `Alumno no registrado`)

            } else {
                Alerta('success', 'Éxito', `Se asignó calificación`);
                InpCalf.value = '';
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