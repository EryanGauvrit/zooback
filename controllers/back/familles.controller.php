<?php
require_once "./controllers/back/Securite.class.php";
require_once './models/back/familles.manager.php';

class FamillesController{
    private $famillesManager;

    public function __construct(){
        $this->famillesManager = new FamillesManager();
    }
    
    public function visualisation(){
        if(Securite::verifAccessSession()){
            $familles = $this->famillesManager->getFamilles();
            require_once "views/famillesVisualisation.view.php";
        } else {
            throw new Exception("Vous ne disposez pas des droits ");
        }
    }

    public function suppression(){
        if(Securite::verifAccessSession()){

            $idFamille = (int)Securite::secureHTML($_POST['famille_id']);

            if($this->famillesManager->compterAnimaux($idFamille) > 0 ){
                $_SESSION['alert'] = [
                    "message" => "La famille ne peut être supprimée",
                    "type" => "alert-danger"
                ];
            }else{
                $this->famillesManager->deleteDBfamille($idFamille);
                $_SESSION['alert'] = [
                    "message" => "La famille est bien supprimée",
                    "type" => "alert-success"
                ];
            }
            
            header('Location: '.URL.'back/familles/visualisation');
        } else {
            throw new Exception("Vous ne disposez pas des droits ");
        }
    }

    public function modification(){
        if(Securite::verifAccessSession()){
            
            $idFamille = (int)Securite::secureHTML($_POST['famille_id']);
            $libelle = Securite::secureHTML($_POST['famille_libelle']);
            $description = Securite::secureHTML($_POST['famille_description']);
            $this->famillesManager->updateFamille($idFamille,$libelle,$description);

            $_SESSION['alert'] = [
                "message" => "La famille est bien modifiée",
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/familles/visualisation');
        } else {
            throw new Exception("Vous ne disposez pas des droits ");
        }
    }

    public function creationTemplate(){
        if(Securite::verifAccessSession()){
            
            require_once "views/famillesCreation.view.php";
        } else {
            throw new Exception("Vous ne disposez pas des droits ");
        }
    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $libelle = Securite::secureHTML($_POST['famille_libelle']);
            $description = Securite::secureHTML($_POST['famille_description']);
            $idFamille = $this->famillesManager->createFamille($libelle,$description);

            $_SESSION['alert'] = [
                "message" => "La famille a bien été crée avec l'identifiant : ".$idFamille,
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/familles/visualisation');

        } else {
            throw new Exception("Vous ne disposez pas des droits ");
        }
    }
}