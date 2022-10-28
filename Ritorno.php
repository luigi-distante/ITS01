<?php

class Ritorno {
    public $msg;
    public $dati;
    public function __construct($msg, $dati){
        $this->msg      = $msg;        
        $this->dati     = $dati;        
    }
}
