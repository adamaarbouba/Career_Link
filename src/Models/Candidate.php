<?php

namespace App\Models;

class Candidate extends User
{
    private $cv;

    public function __construct($id = null, $name, $email, $password, $cv = null)
    {
        parent::__construct($id, $name, $email, $password, 'candidate');
        $this->cv = $cv;
    }
    public function setRole($role)
    {
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
    public function getCvUrl()
    {
        if ($this->cv) {
            return '/uploads/cvs/' . $this->cv;
        }
        return '';
    }
}
