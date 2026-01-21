<?php

namespace App\Models;

class Offer
{
    private $id;
    private $title;
    private $description;
    private $salary;
    private $category;
    private $tags = [];
    private $applications = [];

    public function __construct($title, $description, $salary, $category, $id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->salary = $salary;
        $this->category = $category;
    }
    

    public function __get($property)
    {
        
            return $this->$property;
        
    }

    public function __set($property, $value)
    {
        
            $this->$property = $value;
        
    }

    public function addTag($tag)
    {
        $this->tags[] = $tag;
    }
    
    public function addApplication($application)
    {
        $this->applications[] = $application;
    }
    
}
