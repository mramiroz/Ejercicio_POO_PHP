<?php
	namespace POO\Model;
	include_once "vendor/autoload.php";
	use POO\Util\Constantes;

	class Factura{
		private Cliente $cliente;
		private Producto $producto;
		private float $transporte;
		private float $importe;

		public function __construct(Cliente $cliente, Producto $producto){
			$this->cliente = $cliente;
			$this->producto = $producto;
			$this->importe = $this->calcularFactura();
			
		}

		public function calcularFactura(){
			$cod = substr($this->cliente->getCodigoPostal(), 0, 2);
			$this->transporte = Constantes::PRECIO_TRANSPORTE;
			foreach (Constantes::CP_FUERA_PENINSULA as $cp) {
				if ($cod == $cp){
					$this->transporte *= Constantes::RECARGO_FUERA_PENINSULA;
					foreach (Constantes::CP_CANARIAS as $cp2) {
						if ($cod == $cp2){
							$this->transporte *= Constantes::DESCUENTO_CANARIAS;
							return $this->producto->getPrecio() + $this->transporte;
						}
					}
					return $this->producto->getPrecio() + $this->transporte;
				}
			}
			return $this->producto->getPrecio() + $this->transporte;
		}
		
		public function crearHtmlFactura(){
			echo "<h1>Tienda Manuel</h1>";
			echo "<h2>Factura simplificada</h2>";
			echo "<p><b>Cliente</b>: ".$this->cliente->getNombre()." ".$this->cliente->getApellidos()."</p>";
			echo "<p><b>Dirección</b>: ".$this->cliente->getDireccion()." ".$this->cliente->getCodigoPostal()." ".$this->cliente->getMunicipio()."</p>";
			echo "<p><b>Productos:</b></p>";
			echo "<p>".$this->producto->getNombre()." ".$this->producto->getPrecio()."€</p>";
			echo "<p><b>Transporte: </b>".$this->transporte."€</p>";
			echo "<p><b>TOTAL</b>: ".$this->importe."</p>";
		}

		public function crearMdFactura(){
			echo "# Tienda Manuel";
			echo "## Factura simplificada";
			echo "Cliente: ".$this->cliente->getNombre()." ".$this->cliente->getApellidos();
			echo "Dirección: ".$this->cliente->getDireccion()." ".$this->cliente->getCodigoPostal()." ".$this->cliente->getMunicipio();
			echo "Productos:";
			echo $this->producto->getNombre()." ".$this->producto->getPrecio()."€";
			echo "Transporte ".$this->transporte."€";
			echo "TOTAL: ".$this->importe;
		}

		public static function crearFactura(Cliente $cliente, Producto $producto){
			$factura = new Factura($cliente, $producto);
			$factura->importe = $factura->calcularFactura();
			if ($factura->cliente->getTipoTicket() == '0')
				$factura->crearHtmlFactura();
			else
				$factura->crearMdFactura();
			return $factura;
		}
	}
?>