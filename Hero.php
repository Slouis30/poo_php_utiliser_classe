<?php
    class Hero{
        private $_id;
        private $_nom;
        private $_niveau;
        private $_experience;
        private $_pointsDeVie;
        private $_forcePerso;

        public function __construct(array $data){
            $this->hydrate($data);
        }
        
        public function hydrate(array $data){
            foreach($data as $key => $value){
                $setter = "set".ucfirst($key);
                if(method_exists($this, $setter)){
                    $this->$setter($value);
                }
            }
        }

        public function id(){return $this->_id;}
        public function nom(){return $this->_nom;}
        public function niveau(){return $this->_niveau;}
        public function experience(){return $this->_experience;}
        public function pointsDeVie(){return $this->_pointsDeVie;}
        public function forcePerso(){return $this->_forcePerso;}

        public function setId($id){
            $id = (int) $id;
            if($id > 0){
                $this->_id = $id;
            }
        }
        public function setNom($nom){
            if(is_string($nom) && strlen($nom) <= 40){
                $this->_nom = $nom;
            }
        }
        public function setForcePerso($forcePerso){
            $forcePerso = (int) $forcePerso;
            if($forcePerso >= 1 && $forcePerso <= 100){
                $this->_forcePerso = $forcePerso;
            }
        }
        public function setPointsDeVie($pointsDeVie){
            $pointsDeVie = (int) $pointsDeVie;
            if($pointsDeVie >= 0 && $pointsDeVie <= 100){
                $this->_pointsDeVie = $pointsDeVie;
            }
        }
        public function setNiveau($niveau){
            $niveau = (int) $niveau;
            if($niveau >= 1 && $niveau <= 100){
            $this->_niveau = $niveau;
            }
        }
        public function setExperience($experience){
            $experience = (int) $experience;
            if($experience >= 0 && $experience <= 100){
            $this->_experience = $experience;
            }
        }
    }