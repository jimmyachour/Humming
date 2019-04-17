<?php

namespace App\Model;

class ClientManager extends AbstractManager
{
    public function add($client)
    {
        $sql = "INSERT INTO $this->table (lastname, firstname, mail, phone, message) VALUES (:lastname, :firstname, :mail, :phone, :message)";
        $statement = $this->pdo->prepare($sql);

        $statement->bindValue('lastname', $client['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('firstname', $client['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('mail', $client['mail'], \PDO::PARAM_STR);
        $statement->bindValue('phone', $client['phone'], \PDO::PARAM_STR);
        $statement->bindValue('message', $client['message'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
