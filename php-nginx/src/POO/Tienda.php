<?php
	include_once "Producto.php";

	class Tienda{
		private $productos = [];
		
		public function getProductos()
		{
			return $this->productos;
		}
		public function __construct()
		{
			$this->productos = $this->todosProductosTienda();
		}
		public function todosProductosTienda(){
			$productos[] = new Producto("Sofás de 3 plazas", 200);
			$productos[] = new Producto("Sofás de 4 plazas", 250);
			$productos[] = new Producto("Cocinas", 1000);
			$productos[] = new Producto("Canapé de 90", 150);
			$productos[] = new Producto("Canapé de 120", 200);
			$productos[] = new Producto("Canapé de 150", 250);
			$productos[] = new Producto("Lavadores y lavavajillas", 200);
			return $productos;
		}
	}
?>