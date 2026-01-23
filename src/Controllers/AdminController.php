<?php

namespace App\Controllers;
use App\Services\AdminService;

class AdminController{
    private $adminServ ;
    public function __construct()
    {
        $this->adminServ = new AdminService();
    }
    public function getAllOffers(){
        $totalOffers = $this->adminServ->getAllOffers();
        include 'src/Views/admin/dashboard.php';
    }
}