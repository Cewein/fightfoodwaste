<?php
require_once __DIR__ . "/../../includes.php";

require_once __DIR__ . "/../../fpdf/tfpdf.php";


if (isset($_POST['dateLivraison']) === true && isset($_POST['beneficiaire']) === true && isset($_POST['idBeneficiaire']) === true && isset($_POST['adress']) === true && isset($_POST['city']) === true) {
    $namePDF = $_POST['beneficiaire'] . "_" . $_POST['dateLivraison'] . ".pdf";
    $beneficiaire = $_POST['beneficiaire'];
    $date = $_POST['dateLivraison'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
}

$i = 0;
$produits=[];
while (isset($_POST[$i]) === true) {
    $produits[$i] = explode(',', $_POST[$i]);
    $i++;
}

/*$namePDF = "bénéficiairex_xx-xx-xxxx.pdf";
$beneficiaire = "bénéficiairex";
$date = "xx-xx-xxxx";
$adress="adress";
$city="city";*/

class PDF extends tFPDF
{
    // En-tête
    function Header()
    {
        //Define text
        $titre = 'Livraison ' . $_POST['beneficiaire'] . ' du ' . $_POST['dateLivraison'];

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

    function EnteteLivraison($adress, $city, $date, $beneficiaire)
    {
        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $this->SetFont('DejaVu', '', 12);
        $this->SetY(40);

        //Display infos of bénéficiaire
        $this->Cell(0, 6, "Destinataire : $beneficiaire", 0, 1, 'L', false);
        $this->Cell(0, 6, "Adresse : $adress", 0, 1, 'L', false);
        $this->Cell(0, 6, "Ville : $city", 0, 1, 'L', false);
        $this->Cell(0, 6, "Date de livraison : $date", 0, 1, 'L', false);
        $this->Cell(0, 6, "", 0, 1, 'L', false);
    }

    function ArrayProducts($header, $produits)
    {
        $this->Cell(0, 6, "Contenu de la livraison : ", 0, 1, 'L', false);
        // En-tête
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Données
        foreach ($produits as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }
}

if(count($produits) >0){
    //header Array
    $header=array('id Produit', 'Code Barre', 'Quantité');

// Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->EnteteLivraison($adress, $city, $date, $beneficiaire);
    $pdf->ArrayProducts($header, $produits);
    $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
    $pdf->SetFont('DejaVu', '', 12);

    $pdf->Output($namePDF, 'D');
}
else{
    header('Location: ../tourneePDFView.php');
}


