<?php

namespace App\Controllers;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use App\Repositories\CandidateRepository;

class OfferController
{
    private $offerRepo;
    private $candidateRepo;

    public function __construct()
    {
        $this->offerRepo = new OfferRepository();
        $this->candidateRepo = new CandidateRepository();
    }

    public function index()
    {
        $data = $this->offerRepo->findAll();
        $offers = array_map(function ($item) {
            return new Offer(
                $item['title'],
                $item['description'],
                $item['salary'],
                $item['category_id'],
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

        $offer = new Offer($title, $description, $salary, $category_id);
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
