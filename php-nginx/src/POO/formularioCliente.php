<?php
	include_once("Navegacion.php");
	include_once("Cliente.php");
?>

<form action="" method="<?=Navegacion::N_REQUEST?>">
	<p>
		<label for="<?=Cliente::C_NOMBRE?>">Nombre</label>
		<input type="text" name="<?=Cliente::C_NOMBRE?>">
	</p>
	<p>
		<label for="<?=Cliente::C_APELLIDOS?>">Apellidos</label>
		<input type="text" name="<?=Cliente::C_APELLIDOS?>">
	</p>
	<p>
		<label for="<?=Cliente::C_DIRECCION?>">Dirección</label>
		<input type="text" name="<?=Cliente::C_DIRECCION?>">
	</p>
	<p>
		<label for="<?=Cliente::C_MUNICIPIO?>">Municipio</label>
		<input type="text" name="<?=Cliente::C_MUNICIPIO?>">
	</p>
	<p>
		<label for="<?=Cliente::C_CODIGO_POSTAL?>">Código Postal</label>
		<input type="text" name="<?=Cliente::C_CODIGO_POSTAL?>">
	</p>
	<input type="submit" name="<?=Navegacion::N_CLIENTE?>">
</form>