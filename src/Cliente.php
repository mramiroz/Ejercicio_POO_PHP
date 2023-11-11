<?php
	class Cliente{
		const C_NOMBRE = "c_nombre";
		const C_APELLIDOS = "c_apellidos";
		const C_DIRECCION = "c_direccion";
		const C_MUNICIPIO = "c_municipio";
		const C_CODIGO_POSTAL = "c_codigoPostal";
		const C_TIPO_TICKET = "c_tipoTicket";

		private string $nombre;
		private string $apellidos;
		private string $direccion;
		private string $municipio;
		private string $codigoPostal;

		private string $tipoTicket;

		public function getNombre()
		{
				return $this->nombre;
		}
		public function getApellidos()
		{
				return $this->apellidos;
		}
		public function getDireccion()
		{
				return $this->direccion;
		}
		public function getMunicipio()
		{
				return $this->municipio;
		}
		public function getCodigoPostal()
		{
				return $this->codigoPostal;
		}
		public function getTipoTicket()
		{
				return $this->tipoTicket;
		}

		public function __construct(string $nombre, string $apellidos, string $direccion, string $municipio, string $codigoPostal, string $tipoTicket)
		{
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->direccion = $direccion;
			$this->municipio = $municipio;
			$this->codigoPostal = $codigoPostal;
			$this->tipoTicket = $tipoTicket;
		}

		public static function validarCliente($request){
			if(isset($request[Cliente::C_NOMBRE]) && isset($request[Cliente::C_APELLIDOS]) && isset($request[Cliente::C_DIRECCION]) && isset($request[Cliente::C_MUNICIPIO]) && isset($request[Cliente::C_CODIGO_POSTAL])){
				if (empty($request[Cliente::C_NOMBRE]) || empty($request[Cliente::C_APELLIDOS]) || empty($request[Cliente::C_DIRECCION]) || empty($request[Cliente::C_MUNICIPIO]) || empty($request[Cliente::C_CODIGO_POSTAL])){
					return false;
				}
				return true;
			}
			return false;
		}
		
		public static function crearCliente(string $nombre, string $apellidos, string $direccion, string $municipio, string $codigoPostal, string $tipoTicket)
		{
			$cliente = new Cliente($nombre, $apellidos, $direccion, $municipio, $codigoPostal, $tipoTicket);
			return $cliente;
		}

	}