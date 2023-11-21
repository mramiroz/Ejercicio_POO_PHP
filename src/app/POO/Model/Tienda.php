<?php
	namespace POO\Model;
	include_once "vendor/autoload.php";
	use POO\Model\Producto;

	class Tienda{
		private $productos = [];
		
		public function getProductos()
		{
			return $this->productos;
		}
		public function __construct()
		{
			$this->todosProductosTienda();
		}
		public function todosProductosTienda(){
			$this->productos[] = new Producto("Sofás de 3 plazas", 200);
			$this->productos[] = new Producto("Sofás de 4 plazas", 250);
			$this->productos[] = new Producto("Cocinas", 1000);
			$this->productos[] = new Producto("Canapé de 90", 150);
			$this->productos[] = new Producto("Canapé de 120", 200);
			$this->productos[] = new Producto("Canapé de 150", 250);
			$this->productos[] = new Producto("Lavadores y lavavajillas", 200);
		}
	}
?>