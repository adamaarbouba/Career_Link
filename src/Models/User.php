<?php

namespace App\Models;

abstract class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($name, $email, $password,$id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    abstract public function setRole(Role $role);
}
