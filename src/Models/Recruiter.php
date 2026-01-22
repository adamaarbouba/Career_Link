<?php

namespace App\Models;

class Recruiter extends User {

    public function __construct( $name, $email, $password) {
        parent::__construct( $name, $email ,$password);
    }

    public function setRole($role) {
        $this->role = $role;
    }
   
    public function __get($name)
    {
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}
