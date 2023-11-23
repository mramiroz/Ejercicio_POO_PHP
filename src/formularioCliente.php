<?php
	include_once "vendor/autoload.php";
	use POO\Util\Navegacion;
	use POO\Model\Cliente;
	include_once "template/head.html";
?>
<div class="container">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8" );?>" method="<?=Navegacion::N_REQUEST?>" class="login-form">
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
		<select name="<?=Cliente::C_TIPO_TICKET?>" id="<?=Cliente::C_TIPO_TICKET?>">
			<option value="0">HTML</option>
			<option value="1">MarkDown</option>
		</select>
		<input type="submit" name="<?=Navegacion::N_CLIENTE?>">
	</form>
</div>
<?php
	include_once "template/foot.html";
?>