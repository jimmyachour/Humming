<?php

namespace App\Model;

use App\Entity\Reservation;

/**
 * Class ReservationManager
 * @package App\Model
 */
class ReservationManager extends AbstractManager  // class ClientManager
{
    const TABLE = 'reservation';

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
    public function add(Reservation $reservation): int
    {
        $sql = "INSERT INTO $this->table 
(reservDate, reservTime, reservNbr, reservLastname, reservFirstname, reservMail,reservPhone) 
VALUES (:reservDate, :reservTime, :reservNbr, :reservLastname, :reservFirstname, :reservMail, :reservPhone)";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue('reservDate', $reservation->getReservDate(), \PDO::PARAM_STR);
        $statement->bindValue('reservTime', $reservation->getReservTime(), \PDO::PARAM_STR);
        $statement->bindValue('reservNbr', $reservation->getReservNbr(), \PDO::PARAM_STR);
        $statement->bindValue('reservLastname', $reservation->getReservLastname(), \PDO::PARAM_STR);
        $statement->bindValue('reservFirstname', $reservation->getReservFirstname(), \PDO::PARAM_STR);
        $statement->bindValue('reservMail', $reservation->getReservMail(), \PDO::PARAM_STR);
        $statement->bindValue('reservPhone', $reservation->getReservPhone(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    public function update($id, Reservation $reservation)
    {
        $statement = $this->pdo->prepare("UPDATE $this->table 
                                                  SET reservDate=:reservDate, 
                                                      reservTime=:reservTime, 
                                                      reservNbr=:reservNbr,
                                                      reservLastname=:reservLastname, 
                                                      reservFirstname=:reservFirstname,
                                                      reservMail=:reservMail,
                                                      reservPhone=:reservPhone
                                                  WHERE id=:id");

        $statement->bindValue('reservDate', $reservation->getReservDate(), \PDO::PARAM_STR);
        $statement->bindValue('reservTime', $reservation->getReservTime(), \PDO::PARAM_STR);
        $statement->bindValue('reservNbr', $reservation->getReservNbr(), \PDO::PARAM_INT);
        $statement->bindValue('reservLastname', $reservation->getReservLastname(), \PDO::PARAM_STR);
        $statement->bindValue('reservFirstname', $reservation->getReservFirstname(), \PDO::PARAM_STR);
        $statement->bindValue('reservMail', $reservation->getReservMail(), \PDO::PARAM_STR);
        $statement->bindValue('reservPhone', $reservation->getReservPhone(), \PDO::PARAM_STR);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        $statement->execute();
    }
}
