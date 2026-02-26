<?php 

class Animal {
    public $Id_animal;
    public $birthdate;
    public $animal_name;
    public $Id_race;
    public $Id_Person;
    public $race_name;

    public function __construct($tab=null) {
        if($tab!=null) {
            if(isset($tab["Id_Animal"])) {
                $this->setIdAnimal($tab["Id_Animal"]);
            }
            if(isset($tab["birthdate"])) {
                $this->setBirthdate($tab["birthdate"]);
            }
            if(isset($tab["animal_name"])) {
                $this->setAnimalName($tab["animal_name"]);
            }
            if(isset($tab["Id_race"])) {
                $this->setIdRace($tab["Id_race"]);
            }
            if(isset($tab["Id_Person"])) {
                $this->setIdPerson($tab["Id_Person"]);
            }
            if(isset($tab["race_name"])) {
                $this->setRaceName($tab["race_name"]);
            }
        }
       
    }

    public function getIdAnimal() {
        return $this->Id_Animal;
    }

    public function setIdAnimal($Id_Animal) {
        $this->Id_Animal = $Id_Animal;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    // Animal name
    public function getAnimalName()
    {
        return $this->animal_name;
    }

    public function setAnimalName($animal_name)
    {
        $this->animal_name = $animal_name;
    }

    // Race ID
    public function getIdRace()
    {
        return $this->Id_race;
    }

    public function setIdRace($Id_race)
    {
        $this->Id_race = $Id_race;
    }

    // Person ID
    public function getIdPerson()
    {
        return $this->Id_Person;
    }

    public function setIdPerson($Id_Person)
    {
        $this->Id_Person = $Id_Person;
    }

    public function getRaceName() {
        return $this->race_name;
    }

    public function setRaceName($race_name) {
        $this->race_name = $race_name;
    }
}

?>