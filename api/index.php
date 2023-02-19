<?php
include 'api.php';

try {
    if (!empty($_GET['demande'])) {
        $url = explode('/', filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case 'users':
                getUsers();
                break;

            case 'ads':
                getAds();
                break;

            case 'appartments':
                getAppartments();
                break;

            case 'houses':
                getHouses();
                break;

            case 'lands':
                getLands();
                break;

            case 'myAds':
                getMyAds();
                break;

            case 'item':
                if (!empty($url[1])) {
                    getAd($url[1]);
                } else {
                    throw new Exception(
                        "Vous n'avez pas renseigné l'id de la demande"
                    );
                }

                break;

            case 'user':
                if (!empty($url[1])) {
                    getUser($url[1]);
                } else {
                    throw new Exception(
                        "Vous n'avez pas renseigné l'id de la demande"
                    );
                }

                break;

            case 'location':
                if (!empty($url[1])) {
                    getAdsByLocation($url[1]);
                } else {
                    throw new Exception(
                        "Vous n'avez pas renseigné l'id de la demande"
                    );
                }

                break;

            default:
                throw new Exception("La demande n'est pas valide");
        }
    } else {
        throw new Exception('Problème de récupération de données. ');
    }
} catch (Exception $e) {
    $erreur = [
        'message' => $e->getMessage(),
        'code' => $e->getCode(),
    ];

    print_r($erreur);
}