<?php 
 //crud animaux -->
require "./class/animalClass.php";

class AnimalManager {
    private $cnx;

    function __construct($cnx) {
        $this->cnx = $cnx;
    }

    function addAnimal(Animal $animal) {
        $sql = "INSERT INTO animal (birthdate, animal_name, Id_race) VALUES (:birthdate, :animal_name, :Id_race)";
        try {
            $preparedRequest = $this->cnx->prepare($sql);
// ;            echo json_encode($animal);
            $birthdate = $animal->getBirthdate();
            $animalName = $animal->getAnimalName();
            $idRace = $animal->getIdRace();
            $preparedRequest->bindParam(":birthdate", $birthdate, PDO::PARAM_STR);
            $preparedRequest->bindParam(":animal_name", $animalName, PDO::PARAM_STR);
            $preparedRequest->bindParam(":Id_race", $idRace, PDO::PARAM_INT);
            // $preparedRequest->bindParam(":birthdate", $animal->getBirthdate(), PDO::PARAM_STR);
            // $preparedRequest->bindParam(":animal_name", $animal->getAnimalName(), PDO::PARAM_STR);
            // $preparedRequest->bindParam(":Id_race", $animal->getIdRace(), PDO::PARAM_INT);
            $result = $preparedRequest->execute();
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    ///// delete a update  softdelete harddelete
    //git
    //portfolio avec project 
    function updateAniaml(Animal $animalToUpdate) {
        $sql = "UPDATE"
        try {
            $preparedRequest = $this->cnx->prepare($sql);
            $result = $preparedRequest->execute();
        } catch (PDOException) {
            $e->getMessage();
        }
    }

















    function deleteAnimal($idAnimal) {
        // $sql = "UPDATE DELETION TO TRUE ";
        $sql = "DELETE FROM animal WHERE Id_Animal=:idAnimal";
        try {
            $preparedRequest = $this->cnx->prepare($sql);
            $preparedRequest->bindParam(":idAnimal", $idAnimal, PDO::PARAM_INT);
            $result = $preparedRequest->execute();
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    function getAnimal($id=null) {
        // $sql = "SELECT * FROM animal";
        $sql = "SELECT a.Id_Animal, a.birthdate, a.animal_name, a.Id_race, a.Id_Person, r.race_name FROM animal a 
        LEFT JOIN race r ON a.Id_race=r.Id_race";
        if($id) {
            echo "id";
        } else {
            try {
                $prep = $this->cnx->prepare($sql);
                $prep->execute();
                $animals = $prep->fetchAll(PDO::FETCH_ASSOC);
                // print_r($animals);
                return $animals;
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

}















?>
