<?php

namespace App\Models;

abstract class User
{
    protected ?int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct($id = null, $name, $email, $password, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    abstract public function setRole(Role $role);
}
