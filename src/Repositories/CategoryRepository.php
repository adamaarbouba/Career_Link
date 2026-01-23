<?php

namespace App\Repositories;
use PDO;

class CategoryRepository extends BaseRepository
{
    protected $table = 'categories';

    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}