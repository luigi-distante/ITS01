<?php
require_once 'Utente.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBContatto
 *
 * @author luigi
 */
class DBContatto {
    public static function nuovoContatto($pdo, $contatto){
        $ritorno = new Ritorno("","");
        try{
            $sql='INSERT INTO CONTATTO (NOME, COGNOME, TELEFONO, SESSO, IDGRUPPO, USER) VALUES (:nome,:cognome,:telefono,:sesso,:idgruppo,:user)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome',       $contatto->nome);
            $stmt->bindValue(':cognome',    $contatto->cognome);
            $stmt->bindValue(':telefono',   $contatto->telefono);
            $stmt->bindValue(':sesso',      $contatto->sesso);
            $stmt->bindValue(':idgruppo',   $contatto->idgruppo);
            $stmt->bindValue(':user',       $contatto->user);
            $stmt->execute();
            $ritorno->dati="";
        }catch(PDOException $e){
            $ritorno->msg = "Errore nell'inserimento del contatto<br>".$e->getMessage();
        }
        return $ritorno;
    }
    public static function ottieniContatto($pdo, $id){
        $ritorno = new Ritorno("","");
        try{
            $sql='SELECT ID, NOME, COGNOME, TELEFONO, SESSO, IDGRUPPO FROM CONTATTO WHERE ID = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $righe=$stmt->fetchAll();
            $rigaContatto = $righe[0];
            $ritorno->dati=$rigaContatto;
        }catch(PDOException $e){
            $ritorno->msg = "Errore nel reperimento del contatto<br>".$e->getMessage();
        }
        return $ritorno;
    }
    public static function ottieniListaContattiFiltrata($pdo, $filtro, $user){
        $ritorno = new Ritorno("","");
        try{
            if ($filtro->idgruppo != -1){
                $sql="SELECT C.ID, C.NOME AS CNOME, C.COGNOME, C.TELEFONO, C.SESSO, C.IDGRUPPO, G.ID, G.NOME FROM GRUPPO AS G, CONTATTO AS C WHERE C.IDGRUPPO = :idgruppo and C.stato <> 'D' AND C.IDGRUPPO = G.ID and C.USER = :user ";
            }else{
                $sql="SELECT C.ID, C.NOME, C.COGNOME, C.TELEFONO, C.SESSO, C.IDGRUPPO, G.ID, G.NOME FROM GRUPPO AS G, CONTATTO AS C WHERE C.IDGRUPPO <> :idgruppo and C.stato <> 'D' AND C.IDGRUPPO = G.ID  and C.USER = :user ";
            }
            $sql = $sql." AND C.NOME      LIKE :nome";
            $sql = $sql." AND C.COGNOME   LIKE :cognome";
            
            $sql = $sql . " ORDER BY G.NOME, C.COGNOME";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idgruppo', $filtro->idgruppo);
            $stmt->bindValue(':nome', $filtro->nome."%");
            $stmt->bindValue(':cognome', $filtro->cognome."%");
            $stmt->bindValue(':user', $user);
            $stmt->execute();
            $righe=$stmt->fetchAll();
            $ritorno->dati=$righe;
        }catch(PDOException $e){
            $ritorno->msg = "Errore nel reperimento della lista dei contatti per gruppo selezionato <br>".$e->getMessage();
        }
        return $ritorno;
    }
    public static function ottieniListaContattiXidgruppo($pdo, $idgruppo, $user){
        $ritorno = new Ritorno("","");
        try{
            if ($idgruppo != -1){
                $sql="SELECT C.ID, C.NOME AS CNOME, C.COGNOME, C.TELEFONO, C.SESSO, C.IDGRUPPO, G.ID, G.NOME FROM GRUPPO AS G, CONTATTO AS C WHERE C.IDGRUPPO = :idgruppo and C.stato <> 'D' AND C.IDGRUPPO = G.ID and C.USER = :user ORDER BY G.NOME, C.COGNOME ";
            }else{
                $sql="SELECT C.ID, C.NOME, C.COGNOME, C.TELEFONO, C.SESSO, C.IDGRUPPO, G.ID, G.NOME FROM GRUPPO AS G, CONTATTO AS C WHERE C.IDGRUPPO <> :idgruppo and C.stato <> 'D' AND C.IDGRUPPO = G.ID  and C.USER = :user ORDER BY G.NOME, C.COGNOME ";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idgruppo', $idgruppo);
            $stmt->bindValue(':user', $user);
            $stmt->execute();
            $righe=$stmt->fetchAll();
            $ritorno->dati=$righe;
        }catch(PDOException $e){
            $ritorno->msg = "Errore nel reperimento della lista dei contatti per gruppo selezionato <br>".$e->getMessage();
        }
        return $ritorno;
    }

    public static function ottieniListaContatti($pdo, $user){
        $righe=[];
        $msg="";
        $ritorno = new Ritorno($msg, $righe);        
        try{
            $sql="SELECT C.ID, C.NOME, C.COGNOME, C.TELEFONO, C.SESSO, C.IDGRUPPO, G.ID, G.NOME "
                    . "FROM CONTATTO AS C, GRUPPO AS G "
                    . " where C.stato <> 'D' AND C.IDGRUPPO = G.ID and C.USER = :user "
                    . " ORDER BY G.NOME, C.COGNOME ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':user', $user);
            $stmt->execute();
            $righe=$stmt->fetchAll();
            $ritorno->dati=$righe;
            
        }catch(PDOException $e){
            $ritorno->msg = "Errore di accesso ai dati<br>".$e->getMessage();
        }
        return $ritorno;
    }
    
    public static function cancellaContatto($pdo, $id){
        $ritorno = new Ritorno("", "");        
        try{
            //$sql='DELETE FROM CONTATTO WHERE ID = :id';
            $sql="UPDATE CONTATTO SET stato = 'D' WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $ritorno->dati = "";
        }catch(PDOException $e){
            $ritorno->msg = "Errore di accesso ai dati nella cancellazione<br>".$e->getMessage();
        }
        return $ritorno;
    }
    public static function updateContatto($pdo, $contatto, $id){
        $ritorno = new Ritorno("", "");        
        try{
            $sql='UPDATE CONTATTO SET NOME=:nome, COGNOME=:cognome, TELEFONO=:telefono, SESSO=:sesso, IDGRUPPO=:idgruppo WHERE ID = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome', $contatto->nome);
            $stmt->bindValue(':cognome', $contatto->cognome);
            $stmt->bindValue(':telefono', $contatto->telefono);
            $stmt->bindValue(':sesso', $contatto->sesso);
            $stmt->bindValue(':idgruppo', $contatto->idgruppo);
            $stmt->bindValue(':id', $id);
            $stmt->execute();        
            $ritorno->dati = "";
        }catch(PDOException $e){
            $ritorno->msg = "Errore di accesso ai dati nella modifica<br>".$e->getMessage();
        }
        return $ritorno;
    }
}