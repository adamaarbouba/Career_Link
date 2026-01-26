<?php

namespace App\Controllers;
use App\Services\AdminService;

class AdminController{
    private $adminServ;
    public function __construct()
    {
        $this->adminServ = new AdminService();
    }
    public function dashboard(){
        $data = [
           'Offers' => $this->adminServ->getAllOffers(),
           'Recruiters' => $this->adminServ->getAllRecruiters(),
           'Candidates' => $this->adminServ->getAllCandidates()
        ];
        
         include 'src/Views/admin/dashboard.php';
        
    }

}