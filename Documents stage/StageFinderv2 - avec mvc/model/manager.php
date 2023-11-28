<?php 

    class Manager{
        protected $_connection;
        private $model;

        const DBNAME = "stagefinder";
        const HOST   = "localhost";
        const LOGIN  = "root";
        const PWD    = "";

        protected $_stage_id;

        protected function __construct(){
            $this->_connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::LOGIN, self::PWD);
        }

        public function getStageId(){
            return $this->_stage_id;
        }

        public function setStageId($stageId){
            $this->_stage_id = $stageId;
        }

        public function getInformationId(){
            return $this->_information_id;
        }

        public function setInformationId($informationId){
            $this->_information_id = $informationId;
        }

        public function getProfilTuteurId(){
            return $this->_profilTuteur_id;
        }

        public function setProfilTuteurId($profilTuteurId){
            $this->_profilTuteur_id = $profilTuteurId;
        }

        public function getConnexionId(){
            return $this->_connexion_id;
        }

        public function setConnexionId($connexionId){
            $this->_connexion_id = $connexionId;
        }

        
    }

?> 