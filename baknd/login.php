<?php
	session_start();
    include_once("../seguridad.php");
	include_once("herramientas.php");
	include_once("ManejadorMySql.php");
	$user= $_POST["user"];
	$pass= $_POST["pass"];
	
	$manejadorBD= new ManejadorMySql();
	$sql= "SELECT  u.id_tipoUsuario, u.intentosFallidos ".
			"FROM usuario u, pass p ".
			"WHERE u.id_usuario='". $user. "' and p.id_pass=u.id_pass and p.pass=sha1('". $pass. "')";
	$resultadoConsulta= $manejadorBD->realizarConsulta($sql);
	unset($manejadorBD);
	if($resultadoConsulta === false){
        guardarBitacora("Error mysql. [$user]");
        header("Location: ../front/login.php");
        exit;
    }
    if(empty($_SESSION["$user"])){
        $_SESSION["$user"]= 0;
    }
    if(empty($_SESSION["intentosIp"])){
        $_SESSION["intentosIp"]= 0;
    }
    $row= $resultadoConsulta->fetch_row();
    if($row[1]> 0){
        guardarBitacora("{". $_SESSION["$user"]. "} Usuario bloqueado intentó iniciar sesión. [$user]");
        $_SESSION["$user"]= $_SESSION["$user"] + 1;
        $_SESSION["intentosIp"]= $_SESSION["intentosIp"] + 1;
        if($_SESSION["intentosIp"]> 8){
            $bd= new ManejadorMySql();
            $sql= "INSERT INTO bloqueoip(ip) VALUES('". $_SESSION["ip"]. "')";
            $bd->realizarConsulta($sql);
            unset($bd);
        }
        header("Location: ../front/login.php");
        exit;
    }
    switch($row[0]){
        case 1:
            $_SESSION["user"]= $user;
            $_SESSION["alumno"]= true;
        break;
        case 2:
            $_SESSION["user"]= $user;
            $_SESSION["admin"]= true;
        break;
        default:
            $_SESSION["intentosIp"]= $_SESSION["intentosIp"] + 1;
            guardarBitacora("{". $_SESSION["$user"]. "} Intento de inicio de sesión [$user]");
            //echo $_SESSION["$user"];
            $_SESSION["$user"]= $_SESSION["$user"] + 1;
            if($_SESSION["$user"] > 2){
                $bd= new ManejadorMySql();
                $sql= "UPDATE usuario set intentosFallidos=1 WHERE id_usuario='$user'";
                $bd->realizarConsulta($sql);
                unset($bd);
                //$_SESSION["$user"]= 0;
            }
            if($_SESSION["intentosIp"]> 8){
                $bd= new ManejadorMySql();
                $sql= "INSERT INTO bloqueoip(ip) VALUES('". $_SESSION["ip"]. "')";
                $bd->realizarConsulta($sql);
                unset($bd);
            }
            header("Location: ../front/login.php");
            exit;
    }
    $_SESSION["$user"]= 0;
    $_SESSION["intentosIp"]=0;
    guardarBitacora("Inicio de sesión. [$user]");
    header("Location: ../front/principal.php");
    exit;
?>