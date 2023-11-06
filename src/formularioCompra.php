<?php
	include_once("Tienda.php");
	include_once("Producto.php");
	include_once("Navegacion.php");

	const PRODUCTO = "producto";

	$tienda = new Tienda();
	$productos = $tienda->getProductos();
?>
<div class="container">
<?php
	foreach ($productos as $producto) {
?>
	<form action="" method="<?=Navegacion::N_REQUEST?>" class="article-container">
		<label for="<?=PRODUCTO?>" class="article-title"><? echo $producto->__toString()?></label>
		<input type="hidden" name="<?=Producto::P_NOMBRE?>" value="<?=$producto->getNombre()?>">
		<input type="hidden" name="<?=Producto::P_PRECIO?>" value="<?=$producto->getPrecio()?>">
		<input type="submit" name="<?=Navegacion::N_COMPRAR?>" value="Comprar" class="buy-button">
	</form>
<?php
	}
?>
</div>