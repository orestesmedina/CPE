function buscarComputadora(accion) {
    var idEquipo = document.getElementById('placa').value;
    $.ajax({
        type: "POST",
        url: '/CPE/control/ajax/BuscarComputadora.php',
        data: {'placa': idEquipo, 'accion': accion},
        success: function (data) {
            $('#texto').html(data);
        }
    });

}

function buscarImpresora(accion) {
    var idEquipo = document.getElementById('placa').value;
    $.ajax({
        type: "POST",
        url: '/CPE/control/ajax/BuscarImpresora.php',
        data: {'placa': idEquipo, 'accion': accion},
        success: function (data) {
            $('#texto').html(data);
        }
    });

}

function buscarProyector(accion) {
    var idEquipo = document.getElementById('placa').value;
    $.ajax({
        type: "POST",
        url: '/CPE/control/ajax/BuscarProyector.php',
        data: {'placa': idEquipo, 'accion': accion},
        success: function (data) {
            $('#texto').html(data);
        }
    });

}

function buscarTelefono(accion) {
    var idEquipo = document.getElementById('placa').value;
    $.ajax({
        type: "POST",
        url: '/CPE/control/ajax/BuscarTelefono.php',
        data: {'placa': idEquipo, 'accion': accion},
        success: function (data) {
            $('#texto').html(data);
        }
    });

}

function colocarDatosComputadora(procesador, tipo, cantMemoria) {
    document.getElementById('procesador').setAttribute('value', procesador);
    seleccionarSelect('tipo', tipo);
    document.getElementById('cantMemoria').setAttribute('value', cantMemoria);
    
}

function colocarDatosImpresora(consumible, tipo) {
    document.getElementById('consumible').setAttribute('value', consumible);
    seleccionarSelect('tipo', tipo);
}

function colocarDatosProyector(funcionalidad) {
    document.getElementById('funcionalidad').setAttribute('value', funcionalidad);
}

function colocarDatosAsignacion(nombrePersona, idOficina) {
    seleccionarSelect('idOficina', idOficina);
    document.getElementById('idPersona').setAttribute('value', nombrePersona);
    
}

function colocarDatosEquipo(modelo, serie, marca, anioIngreso, observacion, estado, criterio) {
    document.getElementById('modelo').setAttribute('value', modelo);
    document.getElementById('serie').setAttribute('value', serie);
    document.getElementById('marca').setAttribute('value', marca);
    seleccionarSelect('anioIngreso', anioIngreso);
    document.getElementById('observacion').innerHTML = observacion;
    seleccionarSelect('estado', estado);
    document.getElementById('criterio').setAttribute('value', criterio);
    //document.getElementById('estado').setAttribute('value', estado);
}

function colocarDatosTelefono(extension) {
    document.getElementById('extension').setAttribute('value', extension);
}

function  habilitarCamposAsignacion() {
    document.getElementById('placa').setAttribute('readonly', 'TRUE');
    document.getElementById('idOficina').removeAttribute('readonly');
    document.getElementById('idPersona').removeAttribute('readonly');
    document.getElementById('estado').removeAttribute('readonly');
    document.getElementById('observacion').removeAttribute('readonly');
    document.getElementById('btnGuardar').removeAttribute('disabled');
}

function habilitarCamposEquipo() {
    document.getElementById('placa').setAttribute('readonly', 'TRUE');
    document.getElementById('modelo').removeAttribute('readonly');
    document.getElementById('serie').removeAttribute('readonly');
    document.getElementById('marca').removeAttribute('readonly');
    document.getElementById('anioIngreso').removeAttribute('readonly');
    document.getElementById('observacion').removeAttribute('readonly');
    document.getElementById('criterio').removeAttribute('readonly');
}

function habilitarCamposComputadora() {
    document.getElementById('procesador').removeAttribute('readonly');
    document.getElementById('tipo').removeAttribute('readonly');
    document.getElementById('cantMemoria').removeAttribute('readonly');
    
}

function habilitarCamposImpresora() {
    document.getElementById('consumible').removeAttribute('readonly');
    document.getElementById('tipo').removeAttribute('readonly');
}

function habilitarCamposTelefono() {
    document.getElementById('extension').removeAttribute('readonly');
}

function habilitarCamposProyector() {
    document.getElementById('funcionalidad').removeAttribute('readonly');
}

function limpiarCamposEquipo() {
    document.getElementById('modelo').setAttribute('value', "");
    document.getElementById('serie').setAttribute('value', "");
    document.getElementById('marca').setAttribute('value', "");
    document.getElementById('anioIngreso').selectedIndex = 0;
    document.getElementById('observacion').innerHTML = "";
    document.getElementById('estado').selectedIndex = 0;
    document.getElementById('criterio').setAttribute('value', "");
}

function limpiarCamposComputadora() {
    document.getElementById('procesador').setAttribute('value', "");
    document.getElementById('tipo').selectedIndex = 0;
    document.getElementById('cantMemoria').setAttribute('value', "");
    
}

function limpiarCamposImpresora() {
    document.getElementById('consumible').setAttribute('value', "");
    document.getElementById('tipo').selectedIndex = 0;
}

function limpiarCamposTelefono() {
    document.getElementById('extension').setAttribute('value', '');
}

function limpiarCamposProyector() {
    document.getElementById('funcionalidad').setAttribute('value', '');
}

function limpiarCamposAsignacion() {
    document.getElementById('observacion').setAttribute('value', '');
    document.getElementById('estado').setAttribute('value', '');
    document.getElementById('idOficina').selectedIndex = 0;
    document.getElementById('idPersona').setAttribute('value', '');
    document.getElementById('btnGuardar').setAttribute('disabled', 'TRUE');
}

function seleccionarSelect(select, value)
{
    for (var indice = 0; indice < document.getElementById(select).length; indice++)
    {
        if (document.getElementById(select).options[indice].value === value)
            document.getElementById(select).selectedIndex = indice;
    }
}

function deshabilitarCamposEquipo() {
    document.getElementById('placa').removeAttribute('readonly');
    document.getElementById('modelo').setAttribute('readonly', 'TRUE');
    document.getElementById('serie').setAttribute('readonly', 'TRUE');
    document.getElementById('marca').setAttribute('readonly', 'TRUE');
    document.getElementById('anioIngreso').setAttribute('readonly', 'TRUE');
    document.getElementById('observacion').setAttribute('readonly', 'TRUE');
    document.getElementById('estado').setAttribute('readonly', 'TRUE');
    document.getElementById('criterio').setAttribute('readonly', 'TRUE');
}

function deshabilitarCamposComputadora() {
    document.getElementById('procesador').setAttribute('readonly', 'TRUE');
    document.getElementById('tipo').setAttribute('readonly', 'TRUE');
    document.getElementById('cantMemoria').setAttribute('readonly', 'TRUE');
    
}

function deshabilitarCamposImpresora() {
    document.getElementById('consumible').setAttribute('readonly', 'TRUE');
    document.getElementById('tipo').setAttribute('readonly', 'TRUE');
}

function deshabilitarCamposAsignacion() {
    document.getElementById('observacion').setAttribute('readonly', 'TRUE');
    document.getElementById('estado').setAttribute('readonly', 'TRUE');
    document.getElementById('idOficina').setAttribute('readonly', 'TRUE');
    document.getElementById('idPersona').setAttribute('readonly', 'TRUE');
    document.getElementById('btnGuardar').setAttribute('disabled', 'TRUE');
}

function deshabilitarCamposTelefono() {
    document.getElementById('extension').setAttribute('readonly', 'TRUE');
}

function deshabilitarCamposProyector() {
    document.getElementById('funcionalidad').setAttribute('readonly', 'TRUE');
}

function recargarComputadora() {
    window.location.href="../../../web/asignacion/computadora/nuevo.php";
}

function recargarTelefono() {
        window.location.href="../../../web/asignacion/telefono/nuevo.php";
}

function recargarImpresora() {
        window.location.href="../../../web/asignacion/impresora/nuevo.php";
}

function recargarProyector() {
        window.location.href="../../../web/asignacion/proyector/nuevo.php";
}

function recargarOficina() {
        window.location.href="../../web/oficina/nuevo.php";
}