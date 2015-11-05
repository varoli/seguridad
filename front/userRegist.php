<div class="container espacioWell">
	<div class="row">
		<div class="col-sm-5 col-sm-offset-3">
			<form action="#" method="post" class="well" id="formAcceso">
				<h2 class="text-center">..:::  Registro de usuario  :::..</h2>
				<input type="text" class="form-control espacioText" name="user" placeholder="Usuario" pattern=".{3,}" required="required" title="Se requiere como mínimo 3 caracteres"/>
				<input type="password" class="form-control espacioText" name="pass" placeholder="Contraseña" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])(?=.*[¡@]).*$" required="required" title="Mínimo 8 caracteres, por lo menos 1 mayúscula, 1 minúscula y un caracter especial"/>
                <input type="password" class="form-control espacioText" name="confPass" placeholder="Confirmar contraseña" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z])(?=.*[¡@]).*$" required="required"/>
                <select class="form-control espacioText">
                  <option>Alumno</option>
                  <option>Administrador</option>
                </select>
				<input type="submit" class="btn btn-success pull-right espacioText" value="Registrar"/>
				<div class="alert alert-warning clear-both">
					<strong>¡Atención!</strong> La contraseña debe tener como mínimo 8 caracteres, deberá tener por lo menos 1 letra mayúscula, 1 minúscula, 1 caracter especial y 1 número.
				</div>
                <a href="." class="pull-right">Regresar</a>
                <!-- pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" -->
			</form>
		</div>
	</div>
</div>