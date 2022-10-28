<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filtro
 *
 * @author luigi
 */
class Filtro {
    public $idgruppo;
    public $nome;
    public $cognome;
    public function __construct($idgruppo, $nome, $cognome) {
        $this->idgruppo = $idgruppo;
        $this->nome     = $nome;
        $this->cognome  = $cognome;
    }
}
