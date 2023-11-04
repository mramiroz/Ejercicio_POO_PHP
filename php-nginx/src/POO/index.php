<?php
	session_start();
	include_once("Navegacion.php");
	include_once("Cliente.php");
	include_once("Producto.php");
	include_once("Factura.php");

	$request = $_GET;
	$producto = null;
	if (Navegacion::esComprar($request)){
		$producto = Producto::crearProducto($request[Producto::P_NOMBRE], intval($request[Producto::P_PRECIO]));
		$_SESSION['producto'] = serialize($producto);
		include_once("formularioCliente.php");
	}
	else if(Navegacion::esCliente($request))
	{
		if (isset($_SESSION['producto']) && Cliente::validarCliente($request)){
			$producto = unserialize($_SESSION['producto']);
			$cliente = Cliente::crearCliente($request[Cliente::C_NOMBRE], $request[Cliente::C_APELLIDOS], $request[Cliente::C_DIRECCION], $request[Cliente::C_MUNICIPIO], $request[Cliente::C_CODIGO_POSTAL]);
			$factura  = Factura::crearFactura($cliente, $producto);
			echo $factura->crearHtmlFactura();
		}
		else
			include_once("formularioCliente.php");
	}
	else
		include_once("formularioCompra.php");
?>