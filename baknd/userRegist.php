<?php
    session_start();
	include_once("herramientas.php");
	include_once("ManejadorMySql.php");
	$user= $_POST["user"];
	$pass= $_POST["pass"];
    $confPass= $_POST["confPass"];
	
	$manejadorBD= new ManejadorMySql();
    if($pass == $confPass){
        $sql= "SELECT  u.id_tipoUsuario ".
			"FROM usuario u, pass p ".
			"WHERE u.id_usuario='". $user. "' and p.id_pass=u.id_pass and p.pass=sha1('". $pass. "')";
        $resultadoConsulta= $manejadorBD->realizarConsulta($sql);
        unset($manejadorBD);
        if(!$resultadoConsulta){
            $sql="INSERT INTO usuario(id_usuario,intentosFallidos,id_tipoUsuario,id_persona,id_pass) VALUES ('9193',0,..........)";
            $resultadoConsulta= $manejadorBD->realizarConsulta($sql);
            guardarBitacora("Se a registrado el usuario. [$user]");
            header("Location: ../front/principal.php");
            exit;
        }
        guardarBitacora("Ya existe este usuario". [$user]);
        header("Location: ../front/login.php");
        exit;
    }else {
        echo("<script>alert('No coinciden las contraseñas')</script>");
    }
	
?>