<?php
require_once __DIR__ . "/../../includes.php";

require_once __DIR__ . "/../../fpdf/tfpdf.php";

/*$namePDF = "bénéficiairex_xx-xx-xxxx.pdf";
$beneficiaire = "bénéficiairex";
$date = "xx-xx-xxxx";
$adress="adress";
$city="city";*/


if (isset($_POST['idTournee']) === true && isset($_POST['dateTournee']) === true) {
    $idTournee = $_POST['idTournee'];
    $date = $_POST['dateTournee'];
    $namePDF= "Tournee_n".$_POST['idTournee'].".pdf";
}

$livraisons = [];
$i = 0;
while (isset($_POST[$i]) === true) {
    $livraisons[$i] = explode(',', $_POST[$i]);
    $i++;

}


class PDF extends tFPDF
{
    // En-tête
    function Header()
    {
        //Define text
        $titre = 'Tournee ' . $_POST['idTournee'];

        // Logo
        $this->Image('../../pictures/Logo_fight_food_waste.png', 10, 6, 30);
        // Police gras 15
        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $this->SetFont('DejaVu', '', 15);
        // Décalage à droite
        $this->Cell(50);
        // Titre
        $this->Cell(130, 10, $titre, 1, 0, 'C', false);
        // Saut de ligne
        $this->Ln(20);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police italique 8
        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $this->SetFont('DejaVu', '', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function EnteteTournee($tournee,$date)
    {
        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $this->SetFont('DejaVu', '', 12);
        $this->SetY(40);

        //Display infos of bénéficiaire
        $this->Cell(0, 6, "Tournee numéro $tournee", 0, 1, 'L', false);
        $this->Cell(0, 6, "Date : $date", 0, 1, 'L', false);
        $this->Cell(0, 6, "", 0, 1, 'L', false);
    }

    function ArrayLivraisons($header, $livraisons)
    {
        $this->Cell(0, 6, "Contenu de la tournee : ", 0, 1, 'L', false);
        // En-tête
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Données
        foreach ($livraisons as $row) {
            $i=0;
            foreach ($row as $col){
                if($i<3){
                    $this->Cell(40, 6, $col, 1);
                }
                $i++;
            }
            $this->Ln();
        }
    }
}

if (count($livraisons) > 0) {
    //header Array
    $header = array('Nom', 'Adresse', 'Ville');

// Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->EnteteTournee($idTournee, $date);
    $pdf->ArrayLivraisons($header, $livraisons);
    $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
    $pdf->SetFont('DejaVu', '', 12);

    $pdf->Output($namePDF, 'D');
}
