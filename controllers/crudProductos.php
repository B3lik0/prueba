<?php

if (isset($_POST["guardarProducto"])) {
	GuardarProducto();
} elseif (isset($_POST["actualizarProducto"])) {
	ActualizarProducto();
} elseif (isset($_GET["delete"])) {
	BorrarProducto();
} elseif (isset($_POST["producto"])) {
	GetProducto();
}

function GuardarProducto()
{
	include("../config/config.php");
	$material = $_POST['material'];
	$descripcion = $_POST['descripcion'];
	$medida = $_POST['medida'];
	$precio = $_POST['precio'];

	$sql = "INSERT INTO productos (IDMATERIAL, DESCRIPCION, UNIDADMEDIDA, PRECIO1) VALUES('$material', '$descripcion', '$medida', '$precio')";
	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Nuevo producto agregado")';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Problema con el producto!");';
		echo '</script>';
	}
	header('Location: ../productos.php');
}

function ActualizarProducto()
{
	include("../config/config.php");
	$id = $_POST['id'];
	$material = $_POST['material'];
	$descripcion = $_POST['descripcion'];
	$medida = $_POST['medida'];
	$precio = $_POST['precio'];

	$sql = "UPDATE productos SET IDMATERIAL='$material', DESCRIPCION='$descripcion', UNIDADMEDIDA='$medida', PRECIO1='$precio' WHERE id='$id'";
	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("producto ACTUALIZADO")';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Probema con el producto!");';
		echo '</script>';
	}

	header('Location: ../productos.php');
}

function BorrarProducto()
{
	include("../config/config.php");
	$id = $_GET['delete'];

	$sql = "DELETE FROM productos WHERE id='$id'";
	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Registro eliminado exitósamente");';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Error eliminando registro!");';
		echo 'window.location="../productos.php";';
		echo '</script>';
	}
	header('Location: ../productos.php');
}
function GetProducto()
{
	include("../config/config.php");
	$producto = $_POST['producto'];
	$sql = "SELECT * FROM productos WHERE id = '$producto' ";
	$result = mysqli_query($mysqli, $sql);
	echo json_encode(mysqli_fetch_array($result));
}
