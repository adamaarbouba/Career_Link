<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\RecruiterRepository;
use App\Repositories\CandidateRepository;

class AuthService
{
    private UserRepository $userRepo;
    private RoleRepository $roleRepo;
    private RecruiterRepository $recruiterRepo;
    private CandidateRepository $candidateRepo;
    

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->roleRepo = new RoleRepository();
        $this->recruiterRepo = new RecruiterRepository();
        $this->candidateRepo = new CandidateRepository();
    }

    public function login(string $email, string $password)
    {
        $userFound = $this->userRepo->find('email', $email);

        if (!$userFound) {
            return null;
        }

        if (!password_verify($password, $userFound['password'])) {
            return null;
        }

        $role = $this->roleRepo->find('id', $userFound['role_id']);
        $roleEntity = "App\Models\\" . ucfirst($role['title']);

        if (!class_exists($roleEntity)) {
            throw new \RuntimeException("Role class not found: {$roleEntity}");
        }

        $obj = new $roleEntity(
            $userFound['name'],
            $userFound['email'],
            $userFound['password'],
            $userFound['id']
            $userFound['password'],
            $userFound['id']
        );
        $role = new \App\Models\Role($role['title']);
        $obj->setRole($role);

        return $obj;
    }
   public function register($obj)
{
    
    $userFound = $this->userRepo->find('email', $obj->email);
    if ($userFound) {
        return false;
    }

 
    $roleMap = ['admin' => 1, 'recruiter' => 2, 'candidate' => 3];
    $role_id = $roleMap[$obj->role->title] ?? 3;

  
    $passwordHash = password_hash($obj->password, PASSWORD_DEFAULT);
    $userData = [
        'name' => $obj->name, 
        'email' => $obj->email, 
        'password' => $passwordHash, 
        'role_id' => $role_id
    ];

    $userId = $this->userRepo->create($userData);
    $obj->id = $userId;

    if ($obj instanceof \App\Models\Recruiter) {
        $this->recruiterRepo->create([
            'id'      => $userId, 
            'company_name' => $_POST['Company_name'] ?? '',
            'description'  => $_POST['description'] ?? '',
            'company_image'=> $this->handleFileUpload('Company_image')
        ]);
    } 
    elseif ($obj instanceof \App\Models\Candidate) { 
        $this->candidateRepo->create([
            'id' => $userId
        ]);
    }

    return $obj;
}

private function handleFileUpload($key) {
    if (!isset($_FILES[$key]) || $_FILES[$key]['error'] !== UPLOAD_ERR_OK) return null;
    $name = time() . '_' . basename($_FILES[$key]['name']);
    $path = "uploads/" . $name;
    move_uploaded_file($_FILES[$key]['tmp_name'], $path);
    return $path;
}
}
