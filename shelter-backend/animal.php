<?php 

header("Access-Control-Allow-Origin: http://localhost:4200"); 
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,DELETE, PUT");
header("Access-Control-Headers: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");  

require "./managers/animalManager.php";
require "./connection.php";

$http_method = $_SERVER["REQUEST_METHOD"];
// $http_method = "GET";

$dbManager = new DBManager();
$connexion = $dbManager->connect();
$animalManager =  new AnimalManager($connexion);

if($http_method=="GET") {
    try{
        $animals = $animalManager->getAnimal();
        echo json_encode($animals);
        http_response_code(200);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(array("error"=>$e->getMessage));
    }
} else if($http_method=="POST" || $http_method=="PUT") {
    try{
        // echo json_encode($http_method);
        $str = file_get_contents('php://input'); ///  reads a file into a string. This function is the preferred way to read the contents of a file into a string. reads the raw information sent to PHP 
        // echo $str;
        // echo json_encode($str);  /// Returns a string containing the JSON representation of the supplied value
        // $animalTab0 = json_decode($str);   /// Takes a JSON encoded string and converts it into a PHP value.
        $animalTab = json_decode($str, true);   /// Takes a JSON encoded string and converts it into a array
        // print_r($animalTab)
        // echo json_encode($animalTab);

        // print_r($animalTab):
        $animalToAdd = new Animal($animalTab);
        $IsAnimalAdded = $animalManager->addAnimal($animalToAdd);
        echo json_encode($animalToAdd);
        // echo "ceci est:";
        // echo json_encode($animalAdded);echo "ceci est:";
        // http_response_code(200);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(array("error"=>$e->getMessage));
    }
} else if($http_method=="DELETE") {
    try{
        /*
            $jsonStr = file_get_contents('php://input');
            $tabID = json_decode($jsonStr, true);
            $id = $tabID[0];
            $id = json_decode($jsonStr);
        */
        $id = $_GET["id"];
        $animal = $animalManager->deleteAnimal($id);
        echo json_encode($animal);
        http_response_code(200);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(array("error"=>$e->getMessage));
    }
} else if($http_method == "OPTIONS") {
        http_response_code(200);
} else {
    echo "Method not Implemented";
    http_response_code(400);
    
}


?>