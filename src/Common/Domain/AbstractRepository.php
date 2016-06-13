<?php
namespace App\Common\Domain;

use Doctrine\DBAL\Connection;

/**
 * Abstract Repository
 *
 * @package Common\Domain
 */
abstract class AbstractRepository
{
    /**
     * Doctrine DBAL connection object
     *
     * @var Connection
     */
    protected $conn;

    /**
     * Initalize a connection to databse
     *
     * @param Connection $conn
     */
    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }
}
