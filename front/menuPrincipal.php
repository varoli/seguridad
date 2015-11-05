<?php
	@session_start();
    if(empty($_SESSION["alumno"]))
        $_SESSION["alumno"]= false;
	if($_SESSION["alumno"] === true){
		echo "<li><a class='dropdown-toggl' data-toggle='dropdown' href='#'>Buscar</a>". //Menu buscar
			"<ul class='dropdown-menu'><li><a href='#'>Libro</a></li>".
			"<li><a href='#'>Tesis</a></li>".
			"<li><a href='#'>Documentos</a></li>".
			"<li><a href='#'>Enlaces</a></li></ul></li>".
			"<li><a href='baknd/logout.php'>Cerrar sesión</a></li>"; //Cerrar sesión
	}
	
	if(empty($_SESSION["admin"]))
        $_SESSION["admin"]= false;
	if($_SESSION["admin"] === true){
		echo "<li><a class='dropdown-toggl' data-toggle='dropdown' href='#'>Alta</a>". //Menu alta
			"<ul class='dropdown-menu'><li><a href='view/alta-edit-alumno.php'>Alumno</a></li>".
			"<li><a href='view/alta-edit-libro.php'>Libro</a></li>".
			"<li><a href='view/alta-edit-tesis.php'>Tesis</a></li>".
			"<li><a href='view/alta-edit-documento.php'>Documentos</a></li>".
			"<li><a href='view/alta-edit-enlace.php'>Enlaces</a></li></ul></li>".
			"<li><a class='dropdown-toggl' data-toggle='dropdown' href='#'>Baja</a>". //Menu baja
			"<ul class='dropdown-menu'><li><a href='view/con-edi-del-alumno.php' data='baja'>Alumno</a></li>".
			"<li><a href='view/con-edi-del-libro.php' data='baja'>Libro</a></li>".
			"<li><a href='view/con-edi-del-tesis.php' data='baja'>Tesis</a></li>".
			"<li><a href='view/con-edi-del-documento.php' data='baja'>Documentos</a></li>".
			"<li><a href='view/con-edi-del-enlace.php' data='baja'>Enlaces</a></li></ul></li>".
			"<li><a class='dropdown-toggl' data-toggle='dropdown' href='#'>Modificar</a>". //Menu Modifica
			"<ul class='dropdown-menu'><li><a href='view/con-edi-del-alumno.php' data='edit'>Alumno</a></li>".
			"<li><a href='view/con-edi-del-libro.php' data='edit'>Libro</a></li>".
			"<li><a href='view/con-edi-del-tesis.php' data='edit'>Tesis</a></li>".
			"<li><a href='view/con-edi-del-documento.php' data='edit'>Documentos</a></li>".
			"<li><a href='view/con-edi-del-enlace.php' data='edit'>Enlaces</a></li></ul></li>".
			"<li><a class='dropdown-toggl' data-toggle='dropdown' href='#'>Consulta</a>". //Menu consulta
			"<ul class='dropdown-menu'><li><a href='view/con-edi-del-alumno.php''>Alumno</a></li>".
			"<li><a href='view/con-edi-del-libro.php'>Libro</a></li>".
			"<li><a href='view/con-edi-del-tesis.php'>Tesis</a></li>".
			"<li><a href='view/con-edi-del-documento.php'>Documentos</a></li>".
			"<li><a href='view/con-edi-del-enlace.php'>Enlaces</a></li></ul></li>".
			"<li><a href='baknd/logout.php'>Cerrar sesión</a></li>";
	}
?>