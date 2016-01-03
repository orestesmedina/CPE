<?php
require '../../../model/database/Conexion.php';
require '../../../model/components/manejadores/ManejadorComputadora.php';

if (isset($_POST['criterio']) && !empty($_POST['criterio']) &&
        isset($_POST['observacion']) && !empty($_POST['observacion']) &&
        isset($_POST['estado']) && !empty($_POST['estado']) &&
        isset($_POST['placa']) && !empty($_POST['placa']) && isset($_POST['btnModificar'])) {
    
    $manejadorComputadora = new ManejadorComputadora();
     $retorno = $manejadorComputadora->modificarComputadora($_POST['placa'], mb_strtoupper($_POST['criterio'], 'UTF-8'),
             mb_strtoupper($_POST['estado'], 'UTF-8'), mb_strtoupper($_POST['observacion'], 'UTF-8'));
    if($retorno == true) {
        echo '<script language="javascript">alert("Computadora modificada correctamente");'
        . 'window.location.href="../../../web/componente/computadora/modificarComputadora.php";</script>';
    } else {
        echo '<script language="javascript">alert("'.$retorno.'");'
        . 'window.location.href="../../../web/componente/computadora/modificarComputadora.php";</script>';
    }
} else if(isset ($_POST['btnCancelar'])){
    echo '<script language="javascript">window.location.href="../../../web/componente/computadora/modificarComputadora.php";</script>';
    
}
