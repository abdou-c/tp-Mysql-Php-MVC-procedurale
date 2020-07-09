<?php
    require_once '../model/model.php';
    extract($_POST); //recupere tous les name en POST
    //var_dump($_POST);
    var_dump($_POST);

    $matricule = codeAleatoire();
    $clePrimaire = codeAleatoire();
    
    if(isset($submitSimple)){
        
        $ok = ajoutClient($matricule, $nom, $prenom, $telephone, $numCni, $adresse,  $dateNaiss, $sexe);    
    }

    if(isset($subBloque)){
        $ok = addClient($matricule, $clientId, $nameClient, $clientUsername, $sexeClient, $clientbirthday, $telephoneClient, $clientMail);
        $ok = compteBloque($clePrimaire, $dateOuverture, $dateFermeture);
    }
    if(isset($submitCourant)){
        $ok = clientCourant($matricule, $numCniClient, $nomClient, $prenomClient, $sexeUser, $dateNaissClient, $callClient, $adresseClient);
    }

?>

