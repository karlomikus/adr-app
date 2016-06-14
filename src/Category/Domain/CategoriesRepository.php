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

    public function getByID($id)
    {
        $q = $this->conn->createQueryBuilder();

        return $q->select('*')
            ->from($this->table)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->execute()
            ->fetch();
    }
}
