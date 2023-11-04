<?php
	include_once("Tienda.php");
	include_once("Producto.php");
	include_once("Navegacion.php");

	const PRODUCTO = "producto";

	$tienda = new Tienda();
	$productos = $tienda->getProductos();

	foreach ($productos as $producto) {
?>
	<form action="" method="<?=Navegacion::N_REQUEST?>">
		<label for="<?=PRODUCTO?>"><? echo $producto->__toString()?></label>
		<input type="hidden" name="<?=Producto::P_NOMBRE?>" value="<?=$producto->getNombre()?>">
		<input type="hidden" name="<?=Producto::P_PRECIO?>" value="<?=$producto->getPrecio()?>">
		<input type="submit" name="<?=Navegacion::N_COMPRAR?>" value="Comprar">
	</form>
<?php
	}
?>