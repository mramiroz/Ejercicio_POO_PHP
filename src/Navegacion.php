<?php
	class Navegacion{
		const N_COMPRAR = "comprar";
		const N_CLIENTE = "cliente";
		const N_REQUEST = "get";

		public static function esComprar($str){
			if (!isset($str[Navegacion::N_COMPRAR]))
				return false;
			return true;
		}

		public static function esCliente($str){
			if (!isset($str[Navegacion::N_CLIENTE]))
				return false;
			return true;
		}
	}
?>