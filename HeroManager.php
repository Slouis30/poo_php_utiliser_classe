<?php
    class HeroManager{
        private $_db;

        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->_db = $db;
        }

        public function addHero(Hero $hero){
            try{
                $q = $this->_db->prepare("INSERT INTO `personnages`(nom, niveau, experience, pointsDeVie, forcePerso) VALUES(:nom, :niveau, :experience, :pointsDeVie, :forcePerso)");
                $q->bindValue(":nom", $hero->nom());
                $q->bindValue(":niveau", $hero->niveau());
                $q->bindValue(":experience", $hero->experience(), PDO::PARAM_INT);
                $q->bindValue(":pointsDeVie", $hero->pointsDeVie());
                $q->bindValue(":forcePerso", $hero->forcePerso());
                $q->execute();
                echo "Hero ajouté à la base de données.";
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function delete(Hero $hero){
            
        }

        public function getHeros(){
            $heros = [];
            $q = $this->_db->query("SELECT id, nom, niveau, experience, pointsDeVie, forcePerso FROM personnages ORDER BY id");
            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $heros[] = new Hero($data); // Equivalent de array_push//
            }
            return $heros;
        }
    }