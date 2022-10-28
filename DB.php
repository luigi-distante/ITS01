<?php
    require_once 'Ritorno.php';
    
class DB{
    public static function ottieniPDO(){
        $ritorno = new Ritorno("", "");
        $host       = "localhost";
        $dbname     = "scrivania";
        $charset    = "utf8";
        $username   = "root";
        $password   = "";
        $dsn        = "mysql:host=".$host.";dbname=".$dbname.";charset=".$charset.";";
        try{
            $pdo        = new PDO($dsn, $username, $password);  
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            
            $ritorno->dati = $pdo;
        }catch(PDOException $e){
            $msg = "Errore nella connessione al Database<br>";

            $ritorno->msg = $msg;
        }
        
        return $ritorno;
    }
}

