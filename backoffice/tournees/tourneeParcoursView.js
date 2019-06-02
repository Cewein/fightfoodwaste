function displayMap(idTournee) {
    const map = document.getElementById('map');
    const tourneelist=document.getElementById('displayTournees');
    map.style.display='block';
    tourneelist.style.display='none';

    //récupérer les points de livraison
    sendRequestTournee('../backoffice/tournees/GetAdressesLivraison.php',`idTournee=${idTournee}`,)
        //Récupérer les livraisons
        //Récupérer les adresses liées

    //transformer les adresses de livraison en points lat long

    //afficher des boutons avec ces points
}