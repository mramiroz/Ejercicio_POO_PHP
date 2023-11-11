<?php
	class Producto{
		const ID = "id";
		const P_PRODUCTO = "producto";
		const P_NOMBRE = "p_nombre";
		const P_PRECIO = "p_precio";
	
		private static int 	$count = 0;
		private int 		$id;
		private string 		$nombre;
		private int 		$precio;

		public function getNombre()
		{
				return $this->nombre;
		}

		public function getPrecio()
		{
				return $this->precio;
		}

		public function __construct(string $nombre, int $precio)
		{
			$this->id = ++self::$count;
			$this->nombre = $nombre;
			$this->precio = $precio;
		}
		public static function crearProducto(string $nombre, int $precio)
		{
			$producto = new Producto($nombre, $precio);
			return $producto;
		}

		public function __toString()
		{
			return ($this->nombre.": ".$this->precio."€");
		}
	}
?>