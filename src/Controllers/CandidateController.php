<?php

namespace App\Controllers;

use App\Repositories\CandidateRepository;
use App\Repositories\UserRepository;
use App\Models\Candidate;
use App\Models\Role;

class CandidateController
{
    private $userRepo;
    private $candidateRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->candidateRepo = new CandidateRepository();
    }

    // 1. Show Dashboard
    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'candidate') {
            header('Location: /login');
            exit;
        }

        $id = $_SESSION['user_id'];

        // Get data from DB
        $user = $this->userRepo->find('id', $id); 
        $candidate = $this->candidateRepo->find('id', $id);

        // Create Object to send to View
        $candidateObj = new Candidate(
            $user['id'],
            $user['name'],
            $user['email'],
            $user['password'],
            $candidate['cv'] ?? null 
        );

        // Load the view
        require_once __DIR__ . '/../Views/candidate/dashboard.php';
    }

    // 2. Upload CV
    public function update()
    {
        session_start();

        // Security Check
        if ($_SESSION['role'] !== 'candidate') {
            header('Location: /login');
            exit;
        }

        // Handle File Upload
        if (isset($_FILES['cv']) && $_FILES['cv']['error'] === 0) {
            
            $fileName = time() . '_' . $_FILES['cv']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $fileName;

            // Move file to folder
            if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {
                
                // Update Database
                $this->candidateRepo->update($_SESSION['user_id'], [
                    'cv' => $fileName
                ]);
            }
        }

        // Go back to dashboard
        header('Location: /candidate/dashboard');
        exit;
    }
}