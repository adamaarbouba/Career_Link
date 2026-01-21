<?php

namespace App\Models;

class Candidate extends User {

    private $headline;
    private $bio;
    private $cv;

    public function __construct($id = null, $name, $email, $password, $headline = null, $bio = null, $cv = null) {

        parent::__construct($id, $name, $email, $password, 'candidate');
        
        $this->headline = $headline;
        $this->bio = $bio;
        $this->cv = $cv;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getHeadline() {
        return $this->headline;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getCv() {
        return $this->cv;
    }

    public function setHeadline($headline) {
        $this->headline = $headline;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function setCv($cv) {
        $this->cv = $cv;
    }

    public function getCvUrl() {
        if ($this->cv) {
            return '/uploads/cvs/' . $this->cv;
        }
        return '#';
    }
}