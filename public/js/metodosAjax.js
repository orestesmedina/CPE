function buscarComputadora() {
    var idEquipo = document.getElementById('placa').value;
    $.ajax({
        type: "POST",
        url: '/CPE/control/ajax/buscarComputadora.php',
        data: {'placa': idEquipo},
        success: function (data) {
            $('#texto').html(data);
        }
    });

}

function colocarDatosComputadora(modelo, serie, marca, anioIngreso, procesador, tipo, cantMemoria, criterio, observacion, estado) {
    document.getElementById('modelo').setAttribute('value', modelo);
    document.getElementById('serie').setAttribute('value', serie);
    document.getElementById('marca').setAttribute('value', marca);
    seleccionarSelect('anioIngreso', anioIngreso);
    document.getElementById('procesador').setAttribute('value', procesador);
    seleccionarSelect('tipo', tipo);
    document.getElementById('cantMemoria').setAttribute('value', cantMemoria);
    document.getElementById('criterio').setAttribute('value', criterio);
    document.getElementById('observacion').innerHTML = observacion;
    document.getElementById('estado').setAttribute('value', estado);
    habilitarCampoComputadoraExistente();
}

function  habilitarCampoComputadoraExistente() {
    document.getElementById('placa').setAttribute('readonly', 'TRUE');
    document.getElementById('idOficina').removeAttribute('readonly');
    document.getElementById('idPersona').removeAttribute('readonly');
    document.getElementById('observacion').removeAttribute('readonly');
    document.getElementById('btnGuardar').removeAttribute('disabled');
}

function limpiarCampos() {
    document.getElementById('modelo').setAttribute('value', "");
    document.getElementById('serie').setAttribute('value', "");
    document.getElementById('marca').setAttribute('value', "");
    document.getElementById('anioIngreso').selectedIndex = 0;
    document.getElementById('procesador').setAttribute('value', "");
    document.getElementById('tipo').selectedIndex = 0;
    document.getElementById('cantMemoria').setAttribute('value', "");
    document.getElementById('criterio').setAttribute('value', "");
    document.getElementById('observacion').innerHTML = "";
    document.getElementById('estado').setAttribute('value', "");
}

function seleccionarSelect(select, value)
{
    for (var indice = 0; indice < document.getElementById(select).length; indice++)
    {
        if (document.getElementById(select).options[indice].text == value)
            document.getElementById(select).selectedIndex = indice;
    }
}

function desabilitarCampos() {
    document.getElementById('placa').removeAttribute('readonly');
    document.getElementById('modelo').setAttribute('readonly', 'TRUE');
    document.getElementById('serie').setAttribute('readonly', 'TRUE');
    document.getElementById('marca').setAttribute('readonly', 'TRUE');
    document.getElementById('anioIngreso').setAttribute('readonly', 'TRUE');
    document.getElementById('procesador').setAttribute('readonly', 'TRUE');
    document.getElementById('tipo').setAttribute('readonly', 'TRUE');
    document.getElementById('cantMemoria').setAttribute('readonly', 'TRUE');
    document.getElementById('criterio').setAttribute('readonly', 'TRUE');
    document.getElementById('observacion').setAttribute('readonly', 'TRUE');
    document.getElementById('estado').setAttribute('readonly', 'TRUE');
    document.getElementById('idOficina').setAttribute('readonly', 'TRUE');
    document.getElementById('idPersona').setAttribute('readonly', 'TRUE');
    document.getElementById('btnGuardar').setAttribute('disabled', 'TRUE');
}

function habilitarCampos() {
    document.getElementById('placa').setAttribute('readonly', 'TRUE');
    document.getElementById('modelo').removeAttribute('readonly');
    document.getElementById('serie').removeAttribute('readonly');
    document.getElementById('marca').removeAttribute('readonly');
    document.getElementById('anioIngreso').removeAttribute('readonly');
    document.getElementById('procesador').removeAttribute('readonly');
    document.getElementById('tipo').removeAttribute('readonly');
    document.getElementById('cantMemoria').removeAttribute('readonly');
    document.getElementById('criterio').removeAttribute('readonly');
    document.getElementById('observacion').removeAttribute('readonly');
    document.getElementById('estado').removeAttribute('readonly');
    document.getElementById('idOficina').removeAttribute('readonly');
    document.getElementById('idPersona').removeAttribute('readonly');
    document.getElementById('btnGuardar').removeAttribute('disabled');
}

function recargar() {
    window.location.href="../../../web/asignacion/computadora/nuevo.php";
}