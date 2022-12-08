<?php

if (isset($_POST["guardarCliente"])) {
	GuardarCliente();
} elseif (isset($_POST["actualizarCliente"])) {
	ActualizarCliente();
} elseif (isset($_GET["delete"])) {
	BorrarUsuario();
} elseif (isset($_POST["usuario"])) {
	GetUsuario();
}

function GetUsuario()
{
	include("../config/config.php");
	$cliente = json_decode($_POST['id'], true);

	$sql = "SELECT * FROM clientes WHERE IDCLIENTE = '$cliente' ";
	$result = mysqli_query($mysqli, $sql);
	echo "hola";
}


function GuardarCliente()
{
	include("../config/config.php");
	$idcliente = $_POST['idcliente'];
	$razon = $_POST['razon'];
	$rfc = $_POST['rfc'];

	$sql = "INSERT INTO clientes(IDCLIENTE, RAZON_SOCIAL, RFC) VALUES ('$idcliente', '$razon', '$rfc')";
	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Nuevo cliente agregado")';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Probema con el cliente!");';
		echo '</script>';
	}
	header('Location: ../clientes.php');
}

function ActualizarCliente()
{
	include("../config/config.php");
	$idcliente = $_POST['idcliente'];
	$razon = $_POST['razon'];
	$rfc = $_POST['rfc'];

	$sql = "UPDATE clientes SET RAZON_SOCIAL='$razon', RFC='$rfc' WHERE IDCLIENTE='$idcliente'";

	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("cliente ACTUALIZADO")';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Probema con el cliente!");';
		echo '</script>';
	}

	header('Location: ../clientes.php');
}

function BorrarUsuario()
{
	include("../config/config.php");
	$idcliente = $_GET['delete'];

	$sql = "DELETE FROM clientes WHERE IDCLIENTE='$idcliente'";
	if (mysqli_query($mysqli, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Registro eliminado exitósamente");';
		echo 'window.location="../clientes.php";';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'alert("Error eliminando registro!");';
		echo 'window.location="../clientes.php";';
		echo '</script>';
	}
	header('Location: ../clientes.php');
}
