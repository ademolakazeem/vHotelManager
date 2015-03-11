<?php

 require_once("../ClassesController/fpdf/fpdf.php"); 
  
	 
 class myPDF extends FPDF {
    
       
		
        public $sch = "FEDERAL COLLEGE AND TECHNICAL COLLEGE, IJEBU-IMUSIN";
        
        public $arm ;

       
function Header() {

       
        $this->SetFont('Times','B',14);

        $w = $this->GetStringWidth($this->sch)+50;

        $this->SetDrawColor(0,0,180);

        $this->SetFillColor(255,255,255);

        $this->SetTextColor(17,55,6);
		
		//$this->Image('ys.jpg',10,10,15,15);

        $this->Cell($w,9,$this->sch,0,1,'C');

        $this->Ln(5);
		
		$this->Cell(200,0,'Class Data Sheet',0,0,'C');
		
		$this->Ln(5);


        }



        //Page footer method

        function Footer()       {

        //Position at 1.5 cm from bottom

        $this->SetY(-15);

        $this->SetFont('Arial','I',8);

        $this->Cell(0,10,'page footer -> Page '

        .$this->PageNo().'/{nb}',0,0,'C');

        }


function BuildTable($header,$data) {

        //Colors, line width and bold font

        $this->SetFillColor(252,252,252);

        $this->SetTextColor(0);

        $this->SetDrawColor(128,0,0);

        $this->SetLineWidth(.1);

		$this->SetDrawColor(0);


        $this->SetFont('Times','B',8);

        //Header

        // make an array for the column widths

        $w=array(10,85,35,35,35);

        // send the headers to the PDF document

        for($i=0;$i<count($header);$i++)

        $this->Cell($w[$i],7,$header[$i],1,0,'C',1);

        $this->Ln();

        //Color and font restoration

        $this->SetFillColor(248);

        $this->SetTextColor(0);

      //$this->SetFont('Arial','',);



        //now spool out the data from the $data array

        $fill=true; // used to alternate row color backgrounds

       foreach($data as $row)

        {

        $this->Cell($w[0],6,$row[0],'1',0,'L');

        // set colors to show a URL style link

        $this->SetTextColor(21);

        $this->SetFont('');
		$this->SetDrawColor(0);
		
		$this->SetFont('Arial','B',8);
       
        $this->Cell($w[1],6,$row[1],'1',0,'L',$fill);

        // restore normal color settings for 

        $this->SetTextColor(21);
		
		$this->SetFont('Times','B',8);

        $this->Cell($w[2],6,$row[2],'1',0,'C');

		$this->SetTextColor(21);

		$this->SetFont('Times','B',8);
		
		$this->Cell($w[3],6,$row[3],'1',0,'C');

		$this->SetTextColor(21);

        $this->SetFont('Times','B',8);
		
        $this->Cell($w[4],6,$row[4],'1',0,'C');



        $this->Ln();

        // flips from true to false and vise versa

         $fill =! $fill;

        }

        $this->Cell(array_sum($w),0,'','T');

        }



}// end of CLASS

?>