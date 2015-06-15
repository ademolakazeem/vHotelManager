<?php

require("../../ClassesController/fpdf/fpdf.php");
$pdf= new FPDF();
//var_dump(get_class_methods($pdf));
//echo "-----------------------------------------------------------------------------------";
//echo "DBDirect";
//require("../../ClassesController/DBDirect.php");
//$connect= new DBConnecting();
//var_dump(get_class_methods($connect));

$pdf->AddPage();
$pdf->SetFont("Arial", "B", "20");
$pdf->Cell(0, 10, "Hall Feature Report",0,0, "C");
$pdf->Image("../../imgs/uploads/user/VHM201204041144458372_moril.jpg", "70", "22", "60");
//$pdf->
$pdf->Output();

?>