<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBUtente
 *
 * @author luigi
 */
class DBUtente {
    public static function ottieniLista($pdo, $utente){
        $ritorno = new Ritorno("", "");
        try{
            $sql='SELECT user,password FROM UTENTE where user = :user and password=:password';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':user',       $utente->user);
            $stmt->bindValue(':password',   $utente->password);
            $stmt->execute();
            $righe=$stmt->fetchAll();   
            $ritorno->dati = $righe;
        }catch(PDOException $e){
            $ritorno->msg = "Errore DB in autenticazione<br>".$e->getMessage();
        }
        return $ritorno;
    }
}
