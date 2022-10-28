<?php
require_once 'DB.php';
require_once 'DBContatto.php';
require_once 'DBGruppo.php';
require_once 'Ritorno.php';
require_once 'Filtro.php';
require_once 'Contatto.php';

$ritorno = DB::ottieniPDO();
$pdo = $ritorno->dati;
$ritorno = DBGruppo::ottieniListaGruppi($pdo);
$righeGruppo = $ritorno->dati;
if (isset($_GET['action']) && $_GET['action'] == 'listaContattiXidgruppo'){
    $ritorno = DBContatto::ottieniListaContattiFiltrata($pdo, $_SESSION['filtro'], "luigi");
    $righe = $ritorno->dati;
}
if (isset($_GET['action']) && $_GET['action'] == 'del'){
    $id = $_GET['id'];
    DBContatto::cancellaContatto($pdo, $id);
    $righe=array();
    if (isset($_SESSION['filtro'])){
        $filtro = $_SESSION['filtro'];        
        $ritorno = DBContatto::ottieniListaContattiFiltrata($pdo, $_SESSION['filtro'], "luigi");
        $righe = $ritorno->dati;
    }
}
$rigaContatto=array();
if (isset($_GET['action']) && $_GET['action'] == 'upd'){
    $id = $_GET['id'];
    $ritorno = DBContatto::ottieniContatto($pdo, $id);
    $rigaContatto = $ritorno->dati;
    
    if (isset($_SESSION['filtro'])){
        $filtro = $_SESSION['filtro'];        
        $ritorno = DBContatto::ottieniListaContattiFiltrata($pdo, $_SESSION['filtro'], "luigi");
        $righe = $ritorno->dati;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'confermaupd'){
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
        $contatto = new Contatto($nome, $cognome, $telefono, $sesso, $idgruppo, "luigi");

        $id = $_GET['id'];
        
        $ritorno = DBContatto::updateContatto($pdo, $contatto, $id);

        if (isset($_SESSION['filtro'])){
            $filtro = $_SESSION['filtro'];        
            $ritorno = DBContatto::ottieniListaContattiFiltrata($pdo, $_SESSION['filtro'], "luigi");
            $righe = $ritorno->dati;
        }        
        

    if (strlen($ritorno->msg)>0){        
        header("location: index.php?msg=".$ritorno->msg);            
    }
}


include 'actionlista.html.php';
