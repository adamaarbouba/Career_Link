<?php

namespace App\Models;

class Candidate extends User
{
    private $cv;

    public function __construct($id = null, $name, $email, $password, $cv = null)
    {
        parent::__construct($id, $name, $email, $password);
        $this->cv = $cv;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function getCvUrl()
    {
        if ($this->cv) {
            return '/uploads/cvs/' . $this->cv;
        }
        return '';
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
