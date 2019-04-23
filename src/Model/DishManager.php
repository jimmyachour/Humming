<?php

namespace App\Model;

class DishManager extends AbstractManager
{
    const TABLE = 'dish';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAllByType($type): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE type=:type");

        $statement->bindValue('type', $type, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
