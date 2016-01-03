function buscarComputadora() {
    var idEquipo = document.getElementById('placa').value;

        alert(idEquipo);
        $.ajax({
            type: "POST",
            url: '/cpe.ucr.ac.cr/control/ajax/buscarComputadora.php',
            data: {'placa':idEquipo},
            success: function (data) {
                $('#texto').html(data);
            }
        });

}

function colocarDatosComputadora(modelo, serie, marca, anioIngreso, procesador, tipo, cantMemoria, criterio, observacion, estado) {
    document.getElementById('modelo').setAttribute('value', modelo);
    document.getElementById('serie').setAttribute('value', serie);
    document.getElementById('marca').setAttribute('value', marca);
    //document.getElementById('anioIngreso').setAttribute('value', anioIngreso);
    document.getElementById('procesador').setAttribute('value', procesador);
    //document.getElementById('tipo').setAttribute('value', tipo);
    document.getElementById('cantMemoria').setAttribute('value', cantMemoria);
    document.getElementById('criterio').setAttribute('value', criterio);
    document.getElementById('observacion').innerHTML = observacion;
    document.getElementById('estado').setAttribute('value', estado);
    habilitarCampoComputadoraExistente();
}

function  habilitarCampoComputadoraExistente() {
    document.getElementById('idOficina').removeAttribute('readonly');
    document.getElementById('idPersona').removeAttribute('readonly');
}

function limpiarCampos() {
    document.getElementById('modelo').setAttribute('value', "");
    document.getElementById('serie').setAttribute('value', "");
    document.getElementById('marca').setAttribute('value', "");
    //document.getElementById('anioIngreso').setAttribute('value', anioIngreso);
    document.getElementById('procesador').setAttribute('value', "");
    //document.getElementById('tipo').setAttribute('value', tipo);
    document.getElementById('cantMemoria').setAttribute('value', "");
    document.getElementById('criterio').setAttribute('value', "");
    document.getElementById('observacion').innerHTML = "";
    document.getElementById('estado').setAttribute('value', "");
}
