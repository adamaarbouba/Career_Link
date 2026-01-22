<?php
namespace App\Controllers;
use App\Services\AuthService;
use App\Models\Role;
session_start();

class AuthController
{
    private AuthService $authService;
    private $basePath;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->basePath = '/Career_Link';
    }

    public function login()
    {
        $errors = [];
       
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
      
        if (empty($email) || empty($password)) {
            $errors[] = 'Email and password are required';
            $_SESSION['errors'] = $errors;
            header('Location: '.$this->basePath.'/login');
            exit;
        }

        $user = $this->authService->login($email, $password);
        
        if (!$user) {
            $errors[] = 'Invalid email or password';
            $_SESSION['errors'] = $errors;
            header('Location: '.$this->basePath.'/login');
            exit;
        }

        $_SESSION['user'] = [
            'id'   => $user->id,
            'name' => $user->name,
            'role' => $user->role
        ];
       $dashboardPath = $this->basePath . '/' . $user->role->title . '/dashboard';
       header('Location: ' . $dashboardPath);
    exit;
    }
    public function register(){
        $errors = [];

        $name = trim($_POST['name'] ?? "");
        $email = trim($_POST['email'] ?? "");
        $role = trim($_POST['role'] ?? "");
        $password = trim($_POST['password'] ?? "");
        $passwordComformet = trim($_POST['confirm_password'] ?? "");
        
        if(empty($name) || empty($email) || empty($password) || empty($passwordComformet)){
            $errors[] = 'Inputs must be not empty';
        }
        if($password !== $passwordComformet){
            $errors[] = 'password and password comfirm not equiles';
        }
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: '.$this->basePath.'/register');
            exit;
        }
        $roleEntity = "App\Models\\" .ucfirst($role);
        $obj = new $roleEntity($name , $email ,$password);
        $objRole = new Role($role);
        $obj->setRole($objRole);
        
        $user = $this->authService->Register($obj);
        if(!$user){
            $errors[] = 'you are alradeady existe';
            $_SESSION['errors'] = $errors;
            header('Location: '.$this->basePath.'/register');
            exit;
        }
        $_SESSION['user'] = [
            'id'   => $user->id,
            'name' => $user->name,
            'role' => $user->role
        ];
        header('Location: '.$this->basePath.'/'.$obj->role->title.'/dashboard');
        exit;
    }
    public function logout(){
        unset($_SESSION['user']);
        header('Location: '.$this->basePath.'/home');
        exit;
    }
}
