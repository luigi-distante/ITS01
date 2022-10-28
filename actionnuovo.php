<?php
        require_once 'DB.php';
        require_once 'DBGruppo.php';
        require_once 'DBContatto.php';
        require_once 'Contatto.php';
        
        $ritorno        = DB::ottieniPDO();
        $pdo            = $ritorno->dati;
        $ritorno        = DBGruppo::ottieniListaGruppi($pdo);
        $righeGruppo    = $ritorno->dati;
        
        if (isset($_GET['action']) && $_GET['action'] == 'confermanuovo'){
            if (
                strlen($_GET['nome'])>0 &&
                strlen($_GET['cognome'])>0 &&
                strlen($_GET['telefono'])>0 &&
                strlen($_GET['sesso'])>0 
            ){
                $nome       = $_GET['nome'];
                $cognome    = $_GET['cognome'];
                $telefono   = $_GET['telefono'];
                $sesso      = $_GET['sesso'];
                $idgruppo   = $_GET['idgruppo'];
            }
                $contatto =new Contatto($nome, $cognome, $telefono, $sesso, $idgruppo, "luigi");
                
                $ritorno = DBContatto::nuovoContatto($pdo, $contatto);
        }
        $ritorno        = DBContatto::ottieniListaContatti($pdo, "luigi");
        $righe          = $ritorno->dati;
include 'actionnuovo.html.php';
