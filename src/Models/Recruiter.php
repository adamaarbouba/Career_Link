<?php
namespace App\Models;

class Recruiter extends User
{
    protected $company_name;
    protected $description;
    protected $company_image;

    public function setRole(Role $role)
    {
        $this->role = $role;
    }

    public function __get($property)
    {
        return $this->$property;
    }


    public function __set($property, $value)
    {
        
        $this->$property = $value;
    }
}
