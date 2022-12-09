<?php

if (isset($_POST["registroVenta"])) {
	GuardarVenta();
}

function GuardarVenta()
{
	include("../config/config.php");
	$mysqli->autocommit(false);
	$datosVenta = $_POST["registroVenta"];
	$dats = $datosVenta["venta"];
	$idcliente = $datosVenta["IDCLIENTE"];
	$razon = $datosVenta["RAZON_SOCIAL"];
	$rfc = $datosVenta["RFC"];
	$subtotal = $datosVenta["Sumasubtotal"];
	$SumaIVA = $datosVenta["SumaIVA"];
	$SumaTotal = $datosVenta["SumaTotal"];
	$sql = "INSERT INTO documento (IDCLIENTE, RAZON_SOCIAL, RFC, SUBTOTAL, IVA, TOTAL)
	 VALUES('$idcliente', '$razon', '$rfc', '$subtotal', '$SumaIVA', '$SumaTotal')";
	$result = mysqli_query($mysqli, $sql);
	if (!is_string($result)) {
		foreach ($dats[0] as $datos) {
			$idmaterial = $datos["producto"];
			$cantidad = $datos["cantidad"];
			$subtotal = $datos["subtotal"];
			$medida = $datos["medida"];
			$sql2 = "INSERT INTO documentorenglon (IDMATERIAL, UNIDAD_MEDIDA, CANTIDAD, PRECIO1)
				VALUES('$idmaterial', '$medida', '$cantidad','$subtotal')";
			$result2 = mysqli_query($mysqli, $sql2);
			if (!is_string($result2)) {
				$mysqli->autocommit(true);
				echo '<script language="javascript">';
				echo 'alert("Nueva venta realizada")';
				echo '</script>';
				header('Location: ../ventas.php');
			} else {
				$mysqli->rollback();
				echo '<script language="javascript">';
				echo 'alert("Problema con el producto!");';
				echo '</script>';
			}
		}
	} else {
		$mysqli->rollback();
		echo "error al ingresar datos cliente";
	}
}
