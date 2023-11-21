<?php

	include __DIR__ ."/vendor/autoload.php";
	use POO\Util\Sesion;
	use POO\Util\Navegacion;
	use POO\Model\Cliente;
	use POO\Model\Producto;
	use POO\Model\Factura;

	Sesion::crearSesion();
	
	$request = $_POST;
	$producto = null;
	if (Navegacion::esComprar($request)){
		$producto = Producto::crearProducto($request[Producto::P_NOMBRE], intval($request[Producto::P_PRECIO]));
		Sesion::anadirSesion($producto, Producto::P_PRODUCTO);
		include_once("formularioCliente.php");
	}
	else if(Navegacion::esCliente($request))
	{
		if (isset($_SESSION['producto']) && Cliente::validarCliente($request)){
			$producto = Sesion::obtenerSesion(Producto::P_PRODUCTO);
			$cliente = Cliente::crearCliente($request[Cliente::C_NOMBRE], $request[Cliente::C_APELLIDOS], $request[Cliente::C_DIRECCION], $request[Cliente::C_MUNICIPIO], $request[Cliente::C_CODIGO_POSTAL], $request[Cliente::C_TIPO_TICKET]);
			$factura  = Factura::crearFactura($cliente, $producto);
		}
		else
			include_once("formularioCliente.php");
	}
	else
		include_once("formularioCompra.php");
?>