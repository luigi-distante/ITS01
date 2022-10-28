<?php

class Utente {
    public $user;
    public $password;
    public function __construct($user, $password){
        $this->user         = $user;
        $this->password     = $password;
    }
}
