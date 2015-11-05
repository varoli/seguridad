<?php
    include_once("seguridad.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Seguridad Informática</title>
    </head>
    <body>
    	<div class="container-fluid header txt">
    		<div class="row">
    			<div class="col-xs-12">
    				<header>
    					<p class="pull-left"><img class="img-responsive tamImg" src="img/logo_umar.png" /></p>
    					<p class="pull-right"><strong>Fecha: </strong><i><?php echo date("d - m - Y"); ?></i></p>
    				</header>
    			</div>
    		</div>
    		<div class="collapse navbar-collapse pull-right" id="nav">
				<ul class="nav navbar-nav" id="menu">
					<?php include_once("front/menuPrincipal.php"); ?>
				</ul> <!-- /.navbar-nav -->
			</div> <!-- /#nav -->
    	</div>
    	<div class="container" id="contDinamic">
    		<?php
    			if($_SESSION["admin"] == true || $_SESSION["alumno"] == true){
    				include_once("front/principal.php");
    			}else{
    				include_once("front/login.php");
    			}
    		?>
    	</div> <!-- /#contDinamic -->
       <div class="container-fluid footer txt">
        	<div class="row">
    			<div class="col-xs-12">
    				<footer class="">  
        				<p><strong>Alumna: </strong><i>Lizeth vásquez Rojas</i></p>
        				<p><strong>Materia: </strong><i>Seguridad Informática</i></p>
        				<p><strong>Semestre: </strong><i>912</i></p>
        			</footer>
    			</div>
    		</div>
    	</div>
    </body>
</html>