<?php
    @session_start();
    include_once("baknd/herramientas.php");
    include_once("baknd/ManejadorMySql.php");
    
    $_SESSION["ip"]= getIP();
    $bd= new ManejadorMySql();
    $result= $bd->realizarConsulta("SELECT id FROM bloqueoip WHERE ip='". $_SESSION["ip"]. "'");
    unset($bd);
    if($result->num_rows > 0){
        echo "Por seguridad hemos bloqueado esta direccion ip";
        guardarBitacora("Intento de acceso con ip bloqueada");
        session_unset();
        session_destroy();
        exit;    
    }
    //$_SESSION["ip"]= getIp();
    //$result
?>