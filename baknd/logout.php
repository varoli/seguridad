<?php
    session_start();
    include_once("herramientas.php");
    guardarBitacora("Sesión terminada [". $_SESSION["user"]. "]");
	session_unset();
	session_destroy();
	header("Location: ../");
?>