<?php

namespace App\Model;

/**
 * Class ReservationManager
 * @package App\Model
 */
class ReservationManager extends AbstractManager  // class ClientManager
{

    /**
     * ReservationManager constructor.
     */
    public function __construct()
    {
        parent::__construct('reservation');
    }

    /**
     * @param array $reservation
     * @return int
     */
    public function add(array $reservation): int
    {
        $sql = "INSERT INTO $this->table (reservDate, reservTime, reservNbr) 
VALUES (:reservDate, :reservTime, :reservNbr)";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue('reservDate', $reservation['reservDate'], \PDO::PARAM_STR);
        $statement->bindValue('reservTime', $reservation['reservTime'], \PDO::PARAM_STR);
        $statement->bindValue('reservNbr', $reservation['reservNbr'], \PDO::PARAM_STR);


        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}