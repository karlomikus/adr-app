<?php
namespace App\User\Domain;

use App\Common\Domain\AbstractRepository;

class UsersRepository extends AbstractRepository
{
    protected $table = 'users';

    public function getByID($id)
    {
        $q = $this->conn->createQueryBuilder();

        return $q->select('*')->from($this->table)->execute()->fetch();
    }

    public function getByEmail($email)
    {
        $q = $this->conn->createQueryBuilder();

        return $q->select('*')
            ->from($this->table)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->execute()
            ->fetch();
    }
}
