<?php

namespace App\Controllers;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\CategoryRepository;

class OfferController
{
    private $offerRepo;
    private $candidateRepo;
    private $categoryRepo;

    public function __construct()
    {
        $this->offerRepo = new OfferRepository();
        $this->candidateRepo = new CandidateRepository();
        $this->categoryRepo = new CategoryRepository();
    }

    public function index()
    {
        $data = $this->offerRepo->findAllBy('recruteur_id',$_SESSION['user']['id']);
        $offers = array_map(function ($item) {
            $category = $this->categoryRepo->findById($item['category_id']);
            return new Offer(
                $item['title'],
                $item['description'],
                $item['salary'],
                $category,
                $item['id']
            );
        }, $data);
        
        include_once "src/Views/recruiter/dashboard.php";
    }

    public function store()
    {   
        $title = $_POST['title'];
        $description = $_POST['description'];
        $salary = $_POST['salary'];
        $category_id = $_POST['category_id'];

        $category = $this->categoryRepo->findById($category_id);
        $offer = new Offer($title, $description, $salary, $category);
        $this->offerRepo->create($offer);

        header("Location: /offers");
        exit;
    }

    // public function update()
    // {
    //     $offer = new Offer($_POST);
    //     $this->offerRepo->update($offer, $_POST['id']);

    //     header("Location: /offers");
    //     exit;
    // }

    // public function destroy()
    // {
    //     $this->offerRepo->delete($_POST['id']);
    //     header("Location: /offers");
    //     exit;
    // }
}
