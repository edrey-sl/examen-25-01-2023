function Alerta(icono, titulo, texto) {
    Swal.fire({
        icon: icono,
        title: titulo,
        text: texto,
        footer: 'UAG',
        confirmButtonText: "Aceptar"

    })
}


export { Alerta };