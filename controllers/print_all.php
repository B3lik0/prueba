<?php

if (isset($_POST["imprimirPorProducto"])) {
	ImprimirPorProducto();
} elseif (isset($_POST["imprimirPorCliente"])) {
	ImprimirPorCliente();
}

function ImprimirPorProducto()
{
	include("../config/config.php");
	require('../fpdf/fpdf.php');
	$sql = "SELECT d.IDMATERIAL, p.DESCRIPCION, SUM(d.CANTIDAD) as 'TOTAL DE PIEZAS VENDIDAS',  SUM(d.PRECIO1) AS SUBTOTAL FROM `documentorenglon` AS d,productos AS P WHERE d.IDMATERIAL=p.IDMATERIAL GROUP by d.IDMATERIAL";
	$result = mysqli_query($mysqli, $sql);
	if ($result) {
		$pdf = new FPDF();

		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(50, 10, 'Fecha Reporte:' . date('d-m-Y') . '', 0, "R");
		$pdf->Ln(20);
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 10, 'Ventas', 1, 1, "C");
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(10, 8, 'No.', 1);
		$pdf->Cell(45, 8, 'IDMATERIAL', 1);
		$pdf->Cell(45, 8, 'DESCRIPCION', 1);
		$pdf->Cell(45, 8, 'TOTAL DE PIEZAS VENDIDAS', 1);
		$pdf->Cell(45, 8, 'SUBTOTAL', 1);

		$no = 0;
		while ($row = mysqli_fetch_array($result)) {
			$no = $no + 1;
			$pdf->Ln(8);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(10, 8, $no, 1);
			$pdf->Cell(45, 8, $row['IDMATERIAL'], 1);
			$pdf->Cell(45, 8, $row['DESCRIPCION'], 1);
			$pdf->Cell(45, 8, $row['TOTAL DE PIEZAS VENDIDAS'], 1);
			$pdf->Cell(45, 8, $row['SUBTOTAL'], 1);
		}
		$pdf->Output('Reporte por Producto.pdf', 'D');
	} else {
		echo '<script language="javascript">';
		echo 'alert("Problema con el REPORTE!");';
		echo '</script>';
	}
}

function ImprimirPorCliente()
{
	include("../config/config.php");
	require('../fpdf/fpdf.php');
	$sql = "SELECT * FROM documento";
	$result = mysqli_query($mysqli, $sql);
	if ($result) {
		$pdf = new FPDF();

		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(50, 10, 'Fecha Reporte:' . date('d-m-Y') . '', 0, "R");
		$pdf->Ln(20);
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 10, 'Clientes', 1, 1, "C");
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(10, 8, 'No.', 1);
		$pdf->Cell(25, 8, 'IDCLIENTE', 1);
		$pdf->Cell(30, 8, 'RFC', 1);
		$pdf->Cell(50, 8, 'RAZON_SOCIAL', 1);
		$pdf->Cell(25, 8, 'SUBTOTAL', 1);
		$pdf->Cell(25, 8, 'IVA', 1);
		$pdf->Cell(25, 8, 'TOTAL', 1);

		$no = 0;
		while ($row = mysqli_fetch_array($result)) {
			$no = $no + 1;
			$pdf->Ln(8);
			$pdf->SetFont('Arial', '', 12);
			$pdf->Cell(10, 8, $no, 1);
			$pdf->Cell(25, 8, $row['IDCLIENTE'], 1);
			$pdf->Cell(30, 8, $row['RFC'], 1);
			$pdf->Cell(50, 8, $row['RAZON_SOCIAL'], 1);
			$pdf->Cell(25, 8, $row['SUBTOTAL'], 1);
			$pdf->Cell(25, 8, $row['IVA'], 1);
			$pdf->Cell(25, 8, $row['TOTAL'], 1);
		}
		$pdf->Output('Reporte por Cliente.pdf', 'D');
	} else {
		echo '<script language="javascript">';
		echo 'alert("Problema con el REPORTE!");';
		echo '</script>';
	}
}
