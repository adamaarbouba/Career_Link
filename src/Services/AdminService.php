<?php
namespace App\Services;
use App\Repositories\OfferRepository;
class AdminService {
    private $offeRepo;
    public function __construct()
    {
       $this->offeRepo = new OfferRepository();
    }
    public function getAllOffers(){
        $offers = $this->offeRepo->findAll();
        $totalOffers = count($offers);
        return $totalOffers;
    
    }
}