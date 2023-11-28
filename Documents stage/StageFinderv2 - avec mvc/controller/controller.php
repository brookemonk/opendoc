<?php 
 
    require('./model/stageManager.php');

    function listStage(){
        $stageM = new StageManager();
        $stages = $stageM->getStages();
        require("./view/searchView.php");
    }

    function listInformation(){
        $informationM = new InformationManager();
        $informations = $informationM->getInformations();
        require("./view/homeView.php");
    }

    function listInfoStage(){
        $stageM = new StageManager();
        $stages = $stageM->getStages();
        require("./view/gestionStageView.php");
    }

    function listProfilTuteur(){
        $informationM = new InformationManager();
        $informations = $informationM->getInformations();
        require("./view/profilTuteurView.php");
    }

?> 