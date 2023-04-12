<?php

require_once "models/front/API.manager.php";
require_once "models/Model.php";

class APIController {
    private $apiManager;

    public function __construct(){
        $this->apiManager = new APIManager();
    }

    public function getAnimaux($idFamille, $idContinent){
        $animaux = $this->apiManager->getDBAnimaux($idFamille, $idContinent);
        $tabResult = $this->formatDataLignesAnimaux($animaux);
        // echo "<pre>";
        // print_r($tabResult);
        // echo "</pre>";
        Model::sendJSON($tabResult);
    }

    public function getAnimal($idAnimal){
        $lignesAnimal = $this->apiManager->getDBAnimal($idAnimal);
        $tabResult = $this->formatDataLignesAnimaux($lignesAnimal);
        // echo "<pre>";
        // print_r($tabResult);
        // echo "</pre>";
        Model::sendJSON($tabResult);
    }

    private function formatDataLignesAnimaux($lignes){
        $tab = [];
        foreach($lignes as $ligne){
            if(!array_key_exists($ligne['animal_id'],$tab)){
                $tab[$ligne['animal_id']] = [
                    "id" => $ligne['animal_id'],
                    "nom" => $ligne['animal_nom'],
                    "description" => $ligne['animal_description'],
                    "image" => URL."public/images/".$ligne['animal_image'],
                    "famille" => [
                        "idFamille" => $ligne['famille_id'],
                        "libelleFamille" => $ligne['famille_libelle'],
                        "descriptionFamille" => $ligne['famille_description']
    
                    ],
                ];
            }
            
            $tab[$ligne['animal_id']]['continents'][]= [
                "idContinent" => $ligne['continent_id'],
                "libelleContinent" => $ligne['continent_libelle']
            ];
        }

        return $tab;
    }

    public function getContinents(){
        $continent = $this->apiManager->getDBContinent();
        Model::sendJSON($continent);
    }

    public function getFamilles(){
        $familles = $this->apiManager->getDBFamilles();
        Model::sendJSON($familles);
    }

    public function sendMessage(){
        header("Access-Control-Allow-Origin:*");
        // header("Access-Control-Allow-Origin:http://myzoo.eryan-portfolio.com/");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Lenght, Accept-Encoding, X-CSRF-Token, Authorization");
        header("Access-Control-Allow-Method: POST, GET, OPTIONS, PUT, DELETE");
        header("Content-type: application/json");

        $obj = json_decode(file_get_contents('php://input'));

        // $to = 'eryan.gauvrit@gmail.com';
        // $subject = "Message du site MyZoo de : ".$obj->nom;
        // $message = $obj->email;
        // $headers = "From : ".$obj->email;

        // mail($to, $subject, $message, $headers);

        $msgfront = [
            'from' => $obj->email,
            'to' => 'eryan.gauvrit@gmail.com'
        ];

        echo json_encode($msgfront);
    }
}