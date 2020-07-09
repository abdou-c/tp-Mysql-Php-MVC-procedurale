 <?php

function dbConnection(){
    $user = "root";
    $host = "localhost";
    $passwd = "";
    $dbName = 'banque_du_peuple';

    $dsn = "mysql:host=$host;dbname=$dbName";


    try {
        $db = new PDO($dsn, $user, $passwd);
    } catch (PDOException $ex) {
        die("erreur:" .$ex->getMessage());
    }
    return $db;
}

function ajoutClient($matricule, $nom, $prenom, $telephone, $numCni, $adresse,  $dateNaiss, $sexe){
    $sql = "INSERT INTO `personne`(`matricule`,`cin`, `nom`, `prenom`, `sexe`, `dateNaiss`, `telephone`, `email`)
                 VALUES('$matricule','$numCni', '$nom', '$prenom', '$sexe',  '$dateNaiss', '$telephone', '$adresse')
            ";
    $ok = dbConnection();
   
    return $ok->exec($sql);       
}

function codeAleatoire()
        {
            $string = "";
            $chaine = "2643789ABDCEFGHJKMNPRTUVW";
            srand((double)microtime()*1000000);
            for($i=0; $i<8; $i++)
            {
                $string .= $chaine[rand()%strlen($chaine)];
            }
            return $string;
        }

function clientCourant($matricule, $numCniClient, $nomClient, $prenomClient, $sexeUser, $dateNaissClient, $callClient, $adresseClient){
    $sql =  "INSERT INTO `personne`(`matricule`, `cin`, `nom`, `prenom`, `sexe`, `dateNaiss`, `telephone`, `email`)
                VALUES('$matricule', '$numCniClient', '$nomClient', '$prenomClient', '$sexeUser', '$dateNaissClient', '$callClient', '$adresseClient')
            ";
            $ok = dbConnection();
            return $ok->exec($sql);
        }

function addClient($matricule, $clientId, $nameClient, $clientUsername, $sexeClient,  $clientbirthday, $telephoneClient, $clientMail){
    $sql =  "INSERT INTO `personne`(`matricule`, `cin`, `nom`, `prenom`, `sexe`, `dateNaiss`, `telephone`,`email`)
                VALUES('$matricule', '$clientId', '$nameClient', '$clientUsername', '$sexeClient', '$clientbirthday', '$telephoneClient', '$clientMail')
            ";
            
            $ok = dbConnection();
            return $ok->exec($sql);
        }

function compteBloque($clePrimaire, $dateOuverture, $dateFermeture){
    $sql = "INSERT INTO `compte`(`numero`,`dateDebut`, `dateFin`) 
                VALUES('$clePrimaire', '$dateOuverture', '$dateFermeture')
            ";
            // var_dump($sql);

            // die();
            $ok = dbConnection();
            return $ok->exec($sql);

        }


?> 