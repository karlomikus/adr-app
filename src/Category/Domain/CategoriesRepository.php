<?php
namespace App\Category\Domain;

use App\Common\Domain\AbstractRepository;
use Doctrine\DBAL\Connection;
use DusanKasan\Knapsack\Collection;

class CategoriesRepository extends AbstractRepository
{
    protected $table = 'categories';

    public function getAll()
    {
        $q = $this->conn->createQueryBuilder();

        return Collection::from($q->select('*')->from($this->table)->execute()->fetchAll());
    }
}
