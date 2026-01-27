<?php

namespace App\Controllers;

use App\Models\Offer;
use App\Repositories\OfferRepository;
use App\Repositories\CandidateRepository;
use App\Repositories\CategoryRepository;
use App\Utils\ArrayMapper;

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
        $data = $this->offerRepo->findAllBy('recruteur_id', $_SESSION['user']['id']);
        $categories = $this->categoryRepo->findAll();
        $offers = [];
        foreach ($data as $item) {
            $category = $this->categoryRepo->findById($item['category_id']);
            $item['category'] = $category;

            $offers[] = [
                'offer' => ArrayMapper::map($item, Offer::class),
                'applications' => $this->offerRepo->applicationsCountByOfferId($item['id']),
            ];
        }
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
        $this->offerRepo->create([
            'title' => $offer->title,
            'description' => $offer->description,
            'salary' => $offer->salary,
            'category_id' => $category_id,
            'recruteur_id' => $_SESSION['user']['id'],
        ]);
        header("Location: /Career_Link/recruiter/dashboard");
    }

    public function search()
    {
        $title = $_GET['q'] ?? '';
        $recruiterId = $_SESSION['user']['id'];

        $offers = $this->offerRepo->searchByTitle($recruiterId, $title);

        header('Content-Type: application/json');
        echo json_encode($offers);
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
