<?php
require_once __DIR__ . "/../../includes.php";

require_once __DIR__ . "/../../fpdf/tfpdf.php";


if(isset($_POST['dateLivraison'])===true&&isset($_POST['beneficiaire'])===true&&isset($_POST['adress'])===true&&isset($_POST['city'])===true){
    $namePDF = $_POST['beneficiaire'] . "_" . $_POST['dateLivraison'] .".pdf";
    $beneficiaire= $_POST['beneficiaire'];
    $date=$_POST['dateLivraison'];
}



class PDF extends FPDF
{
// En-tête
    function Header()
    {
        //Define text
        $titre = 'Livraison ' . $_POST['beneficiaire'] . ' du ' . $_POST['dateLivraison'];

        // Logo
        $this->Image('../../pictures/Logo_fight_food_waste.png', 10, 6, 30);
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(50);
        // Titre
        $this->Cell(100, 10, $titre, 1, 0, 'C', false);
        // Saut de ligne
        $this->Ln(20);
    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation de la classe dérivée
$pdf = new tFPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$pdf->Output('D', $namePDF);
