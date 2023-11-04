<?php
	include_once("Constantes.php");
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
					return $this->producto->getPrecio() + $this->transporte;
				}
			}
			foreach (Constantes::CP_CANARIAS as $cp) {
				if ($cod == $cp){
					$this->transporte *= Constantes::DESCUENTO_CANARIAS;
					return $this->producto->getPrecio() + $this->transporte;
				}
			}
			return $this->producto->getPrecio() + $this->transporte;
		}
		
		public function crearHtmlFactura(){
			$html = "<h1>Tienda Manuel</h1>";
			$html .= "<h2>Factura Simplificada</h2>";
			$html .= "<hr>";
			$html .= "<p>Cliente: ".$this->cliente->getNombre()." ".$this->cliente->getApellidos()."</p>";
			$html .= "<p>Dirección: ".$this->cliente->getDireccion()." ".$this->cliente->getCodigoPostal()."</p>";
			$html .= "<p>Producto: </p>";
			$html .= "<p>".$this->producto->getNombre()."      ".$this->producto->getPrecio()."€</p>";
			$html .= "<p>Transporte: ".$this->transporte."€</p>";
			$html .= "<p>Total: ".$this->importe."€</p>";
			return $html;
		}

		public static function crearFactura(Cliente $cliente, Producto $producto){
			$factura = new Factura($cliente, $producto);
			$factura->importe = $factura->calcularFactura();
			return $factura;
		}
	}
?>