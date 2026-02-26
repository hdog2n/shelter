<?php 

class DBManager {
    private $cnx;

    function connect() {
        try {
            $strConnection = 'mysql:host=localhost; dbname=shelter';
            $this->cnx = new PDO($strConnection, 'root', '');
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $this->cnx;
    } 
}

?>