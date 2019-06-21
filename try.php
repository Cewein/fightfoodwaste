<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 07/04/2019
 * Time: 22:10
 */

require_once __DIR__ . "/includes.php";

//header('Location: index.php')

//mkdir('C:\Users\Sandrine\Desktop\mydir');

require('fpdf/fpdf.php');

$namePDF = 'test.pdf';

$_POST['beneficiaire'] = 'Beneficiaire4';
$_POST['date'] = '2019-06-13';



class PDF extends FPDF
{
// En-tête
    function Header()
    {
        //Define text
        $titre = 'Livraison ' . $_POST['beneficiaire'] . ' du ' . $_POST['date'];

        // Logo
        $this->Image('pictures/Logo_fight_food_waste.png', 10, 6, 30);
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
for ($i = 1; $i <= 40; $i++)
    $pdf->Cell(0, 10, 'Impression de la ligne numéro ' . $i, 0, 1);
$pdf->Output('D', $namePDF, true);
?>
