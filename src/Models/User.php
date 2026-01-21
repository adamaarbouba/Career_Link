<?php

namespace App\Models;

abstract class User
{
    protected ?int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct($name, $email, $password ,$id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    abstract public function setRole(Role $role);
}
