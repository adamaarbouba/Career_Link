<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class OfferRepository extends BaseRepository {
    protected $table = 'offers';

    public function applicationsCountByOfferId(int $offerId)
    {
        $sql = "SELECT COUNT(*) FROM candidates_offers WHERE offer_id = :offer_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['offer_id' => $offerId]);
        return $stmt->fetchColumn();
    }

    public function searchByTitle(int $recruiterId, string $title): array
{
    $sql = "
        SELECT *
        FROM offers
        WHERE recruteur_id = ?
        AND title LIKE ?
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$recruiterId, '%' . $title . '%']);
    return $stmt->fetchAll();
}
}

