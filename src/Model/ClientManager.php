<?php
namespace App\Model;

use App\Entity\Client;

class ClientManager extends AbstractManager
{
    const TABLE = 'client';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    public function add(Client $client):void
    {
        $sql = "INSERT INTO $this->table (lastname, firstname, mail, phone, message) VALUES (:lastname, :firstname, :mail, :phone, :message)";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue('lastname', $client->getLastname(), \PDO::PARAM_STR);
        $statement->bindValue('firstname', $client->getFirstname(), \PDO::PARAM_STR);
        $statement->bindValue('mail', $client->getMail(), \PDO::PARAM_STR);
        $statement->bindValue('phone', $client->getPhone(), \PDO::PARAM_STR);
        $statement->bindValue('message', $client->getMessage(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}

