<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class OfferRepository extends BaseRepository {
    protected $table = 'offers';
    public function getAllWithRecruiter(){
        $stmt = $this->conn->prepare("SELECT o.* ,r.company_name FROM offers o join recruteurs r on o.recruteur_id = r.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

