<?php
namespace App\Services;

use App\Repositories\OfferRepository;
use App\Repositories\RecruiterRepository;
use App\Repositories\CandidateRepository;

class AdminService {
    private $offeRepo;
    private $recruiterRepo;
    private $candidateRepo;
    public function __construct()
    {
       $this->offeRepo = new OfferRepository();
       $this->recruiterRepo = new RecruiterRepository();
       $this->candidateRepo = new CandidateRepository();
    }
    public function getAllOffers(){
        $offers = $this->offeRepo->getAllWithRecruiter();
        
        return $offers;
    }
    public function getAllRecruiters(){
        $recruiters = $this->recruiterRepo->findAll();
        return $recruiters;
    }
    public function getAllCandidates(){
        $candidates = $this->candidateRepo->findAll();
        return $candidates;
    }
}