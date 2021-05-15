<?php
    class Personnage{
        private $_nom;
        private $_force;
        private $_localisation;
        private $_experience;
        private $_pointsDeVie = 100;
        const FORCE_PETITE = 20; const FORCE_MOYENNE = 50; const FORCE_GRANDE = 80;
        const ZERO = 0;
        private $_pays = ["France", "Belgique", "Espagne", "Italie", "Suisse"];
        private static $_texteADire = "Je suis un attribut statique appelé par une méthode statique!";
        private static $compteur = 0;

        public function __construct($nom, $force){
            $this->setNom($nom);
            $this->setForce($force);
            $this->setExperience(Personnage ::ZERO);
            self::$compteur++;
        }
        public function deplacer(){
            $this->_localisation = $this->_pays[random_int(0, count($this->_pays) - 1)];
            echo "<br>";
            echo "$this->_nom se déplace jusqu'en $this->_localisation.";
            echo "<br>";
        }
        public function frapper(Personnage $persoAFrapper){
            echo "<br>";
            echo "$this->_nom frappe $persoAFrapper->_nom.";
            echo "<br>";
        }
        public function gagnerExperience($experienceAGagner){
            $this->_experience = $this->_experience += $experienceAGagner;
            echo "<br>";
            echo "$this->_nom a gagné 1 point d'expérience!<br>";
            echo "<br>";
            echo "Il a maintenant " . $this->_experience . " points d'experience.";
            echo "<br>";
        }
        public function setNom($nom){
            if(!is_string($nom) || empty($nom)){
                trigger_error("Le nom du personnage doit être une chaîne de caractères avec ou sans chiffres (@param string \$nom).", E_USER_WARNING);
                return;
            }
            else{
                $this->_nom = $nom;
            }
        }
        public function setExperience($experience){
            if(!is_int($experience)) {
                trigger_error("L'expérience d'un personnage doit être un nombre entier (@param int \$experience).", E_USER_WARNING);
                return;
            }
            if($experience > 100 || $experience < 0){
                trigger_error("L'expérience d'un personnage ne peut dépasser 100 ou être en dessous de 0.", E_USER_WARNING);
                return;
            }
            $this->_experience = $experience;
        }
        public function setForce($force){
            if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])){
                $this->_force = $force;
            }
        }
        public static function compteur(){
            return self::$compteur;
        }
        public function nom(){
            return $this->_nom;
        }
        public function force(){
            return $this->_force;
        }
        public function experience(){
            return $this->_experience;
        }
        public static function fonctionStatique(){
            echo "<br>";
            echo self::$_texteADire;
            echo "<br>";
        }
    } //________________________________________________________\
     //////////////// Fin de la classe Personnage ///////////////\
    ////////////////////////////////////////////////////////////  \