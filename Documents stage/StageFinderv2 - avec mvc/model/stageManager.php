<?php 

    require_once("manager.php");

    class StageManager extends Manager{
        public function __construct($stage_id = 0){
            parent::__construct();
            $this->_stage_id = $stage_id;
        }

        public function getStages(){
            $req = $this->_connection->query('SELECT Offre.id_offre, nom_offre, nom_entreprise, description_offre, duree_stage, ville_offre, nom_promo FROM `Offre`, Offre_Promo, Promo WHERE Offre.id_offre = Offre_Promo.id_offre AND Offre_Promo.id_promo = Promo.id_promo;');
            $stages = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return $stages;
        }

        public function getStage(){
            $req = $this->_connection->prepare('SELECT Offre.id_offre, nom_offre, nom_entreprise, description_offre, duree_stage, ville_offre, nom_promo FROM `Offre`, Offre_Promo, Promo WHERE Offre.id_offre = Offre_Promo.id_offre AND Offre_Promo.id_promo = Promo.id_promo;');
            $req->execute(array(':id_offre' => $this->_stage_id));
            $stage = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return $stage;
        }
    }

    class InformationManager extends Manager{
        public function __construct($information_id = 0){
            parent::__construct();
            $this->_information_id = $information_id;
        }

        public function getInformations(){
            $req = $this->_connection->query('SELECT etudiant.id_etudiant, nom_etudiant, prenom_etudiant, nom_promo, mineure FROM etudiant, promo, etudiant_promo WHERE etudiant.id_etudiant = etudiant_promo.id_etudiant AND promo.id_promo = etudiant_promo.id_promo;');
            $informations = array();
            while($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $informations[] = $row;
            }
            $req->closeCursor();
            return $informations;
        }
    }

    class ProfilTuteurManager extends Manager{
        public function __construct($profilTuteur_id = 0){
            parent::__construct();
            $this->_profilTuteur_id = $profilTuteur_id;
        }

        public function getProfilTuteurs(){
            $req = $this->_connection->query('SELECT * FROM tuteur WHERE id_tuteur=1;');
            $profilTuteurs = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return $profilTuteurs;
        }

        public function getProfilTuteur(){
            $req = $this->_connection->prepare('SELECT * FROM tuteur WHERE id_tuteur=1;');
            $req->execute();
            $profilTuteur = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            return $profilTuteur;
        }
    }

    class ConnexionManager extends Manager{
        public function __construct($connexion_id = 0){
            parent::__construct();
            $this->_connexion_id = $connexion_id;
        }

    }

?> 