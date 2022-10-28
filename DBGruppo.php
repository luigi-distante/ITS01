<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBGruppo
 *
 * @author luigi
 */
class DBGruppo {
    public static function ottieniListaGruppi($pdo){
        $ritorno = new Ritorno("","");
        try{
            $sql='SELECT ID, NOME FROM GRUPPO ORDER BY NOME';
            $result = $pdo->query($sql);//riempio $result con tutte le righe di CONTATTO
            $righeGruppo = [];                //inixializzo un array
            while ($row=$result->fetch()){
                $righeGruppo[]=$row;
            }
            $ritorno->dati = $righeGruppo;
        }catch(PDOException $e){
            $ritorno->msg = "Errore DB nell'accesso ai gruppi.<br>".$e->getMessage();
        }
        return $ritorno;
    }
}
