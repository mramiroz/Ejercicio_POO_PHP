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
			$plantilla = file_get_contents('plantillasFactura/factura.html');
			$plantilla = str_replace("{{nombre}}", $this->cliente->getNombre(), $plantilla);
			$plantilla = str_replace("{{apellidos}}", $this->cliente->getApellidos(), $plantilla);
			$plantilla = str_replace("{{direccion}}", $this->cliente->getDireccion(), $plantilla);
			$plantilla = str_replace("{{municipio}}", $this->cliente->getMunicipio(), $plantilla);
			$plantilla = str_replace("{{cp}}", $this->cliente->getCodigoPostal(), $plantilla);
			$plantilla = str_replace("{{producto}}", $this->producto->getNombre(), $plantilla);
			$plantilla = str_replace("{{precio}}", $this->producto->getPrecio(), $plantilla);
			$plantilla = str_replace("{{transporte}}", $this->transporte, $plantilla);
			$plantilla = str_replace("{{importe}}", $this->importe, $plantilla);
			$nombre_factura = 'factura_'.time().'.html';
			$ruta = "facturas/".$nombre_factura;
			file_put_contents($ruta, $plantilla);
			header("Location: $ruta");
			exit;
		}

		public function crearMdFactura(){
			$plantilla = file_get_contents('plantillasFactura/factura.md');
			$plantilla = str_replace("{{nombre}}", $this->cliente->getNombre(), $plantilla);
			$plantilla = str_replace("{{apellidos}}", $this->cliente->getApellidos(), $plantilla);
			$plantilla = str_replace("{{direccion}}", $this->cliente->getDireccion(), $plantilla);
			$plantilla = str_replace("{{municipio}}", $this->cliente->getMunicipio(), $plantilla);
			$plantilla = str_replace("{{cp}}", $this->cliente->getCodigoPostal(), $plantilla);
			$plantilla = str_replace("{{producto}}", $this->producto->getNombre(), $plantilla);
			$plantilla = str_replace("{{precio}}", $this->producto->getPrecio(), $plantilla);
			$plantilla = str_replace("{{transporte}}", $this->transporte, $plantilla);
			$plantilla = str_replace("{{importe}}", $this->importe, $plantilla);
			$nombre_factura = 'factura_'.time().'.md';
			$ruta = "facturas/".$nombre_factura;
			file_put_contents($ruta, $plantilla);
			header("Location: $ruta");
			exit;
		}

		public static function crearFactura(Cliente $cliente, Producto $producto){
			$factura = new Factura($cliente, $producto);
			$factura->importe = $factura->calcularFactura();
			if ($factura->cliente->getTipoTicket() == '0')
			{
				echo $factura->crearHtmlFactura();
			}
			else
			{
				$factura->crearMdFactura();
			}
			return $factura;
		}
	}
?>