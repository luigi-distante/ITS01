<?php

class Contatto {
    public $nome;
    public $cognome;
    public $telefono;
    public $sesso;
    public $idgruppo;
    public $user;
    public function __construct($nome, $cognome, $telefono, $sesso, $idgruppo, $user){
        $this->nome         = $nome;
        $this->cognome      = $cognome;
        $this->telefono     = $telefono;
        $this->sesso        = $sesso;
        $this->idgruppo     = $idgruppo;
        $this->user         = $user;
    }
}
