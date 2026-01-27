<?php
namespace App\Controllers;

use App\Repositories\RecruiterRepository;
use App\Repositories\UserRepository;
use App\Repositories\BaseRepository;
use App\Models\Recruiter;
use App\Models\Role;
use App\Config\Connection;
use PDO;

class RecruiterController
{
    private UserRepository $userRepo;
    private BaseRepository $recruiterRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();

        // Repository simple pour la table recruteurs
        $this->recruiterRepo = new RecruiterRepository();
    }

    
     //Dashboard recruteur
     
    public function dashboard()
    {
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'recruiter') {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // users table
        $userData = $this->userRepo->find('id', $userId);

        // recruteurs table
        $recruiterData = $this->recruiterRepo->find('id', $userId);

        if (!$userData || !$recruiterData) {
            die('Recruiter not found');
        }

        // Create Recruiter object 
        $recruiter = new Recruiter(
            $userData['name'],
            $userData['email'],
            $userData['password']
        );

        $role = new Role('recruiter');
        $recruiter->setRole($role);
        
        $recruiter->id = $userData['id'];
        $recruiter->company_name  = $recruiterData['company_name'];
        $recruiter->description   = $recruiterData['description'];
        $recruiter->company_image = $recruiterData['company_image'];

        require_once __DIR__ . '/../Views/recruiter/dashboard.php';
    }

    
     //Update recruiter profile
     
    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /recruiter/dashboard');
            exit;
        }

        if ($_SESSION['role'] !== 'recruiter') {
            header('Location: /login');
            exit;
        }

        $this->recruiterRepo->update(
            $_SESSION['user_id'],
            [
                'company_name'  => $_POST['company_name'],
                'description'   => $_POST['description'],
                'company_image' => $_POST['company_image']
            ]
        );

        header('Location: /recruiter/dashboard');
        exit;
    }
}