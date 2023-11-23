<?php
	include_once "vendor/autoload.php";
	use POO\Model\Tienda;
	use POO\Model\Producto;
	use POO\Util\Navegacion;

	$tienda = new Tienda();
	$productos = $tienda->getProductos();
	include_once "template/head.html";
?>
<div class="container">
<?php
	foreach ($productos as $producto) {
?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8" );?>" method="<?=Navegacion::N_REQUEST?>" class="article-container">
		<label for="<?=Producto::P_PRODUCTO?>" class="article-title"><? echo $producto->__toString()?></label>
		<input type="hidden" name="<?=Producto::P_NOMBRE?>" value="<?=$producto->getNombre()?>">
		<input type="hidden" name="<?=Producto::P_PRECIO?>" value="<?=$producto->getPrecio()?>">
		<input type="submit" name="<?=Navegacion::N_COMPRAR?>" value="Comprar" class="buy-button">
	</form>
<?php
	}
?>
</div>
<?php
	include_once "template/foot.html";
?>