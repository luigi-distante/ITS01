<?php
require_once("Filtro.php");
session_start();
if (isset($_GET['action'])){
    switch ($_GET['action']){
        case 'lista':
            ob_start();
            include 'actionlista.php';
            $output = ob_get_clean();
            break;
        case 'nuovo':
            ob_start();
            include 'actionnuovo.php';
            $output = ob_get_clean();
            break;
        case 'listaContattiXidgruppo':
            $filtro = new Filtro($_GET['idgruppo'],$_GET['nome'],$_GET['cognome']);
            $_SESSION['filtro'] = $filtro;            
            ob_start();
            include 'actionlista.php';
            $output = ob_get_clean();
            break;
        case 'del':
            ob_start();
            include 'actionlista.php';
            $output = ob_get_clean();
            break;
        case 'upd':
            ob_start();
            include 'actionlista.php';
            $output = ob_get_clean();
            break;

        case 'confermanuovo':
            ob_start();
            include 'actionnuovo.php';
            $output = ob_get_clean();
            break;
        case 'confermaupd':
            ob_start();
            include 'actionlista.php';
            $output = ob_get_clean();
            break;
        default :
            $output="Nessuna azione";
    }
}else{
    $output="Nessuna azione";
}
include 'layout.php';
