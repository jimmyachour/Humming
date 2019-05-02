<?php

namespace App\Model;

use App\Entity\Dish;

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
    public function selectAllByType(string $type): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE type=:type");

        $statement->bindValue('type', $type, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Dish');
    }

    public function selectWithoutDishOfMenuByType($listIdMenu, $type):array
    {
        $additionalSentence = '';

        foreach ($listIdMenu as $idMenu) {
            $additionalSentence .= ' id!=' . $idMenu['dish_id'] . ' AND';
        }

        $statement = $this->pdo->query("SELECT * FROM $this->table WHERE type='$type' AND" . trim($additionalSentence, 'AND'));

        return $statement->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Dish');
    }

    public function update(INT $id, Dish $dish): void
    {
        $statement = $this->pdo->prepare("UPDATE $this->table 
                                                    SET title=:title, 
                                                        composition=:composition, 
                                                        type=:type, 
                                                        price=:price 
                                                    WHERE id=:id");

        $statement->bindValue('title', $dish->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('composition', $dish->getComposition(), \PDO::PARAM_STR);
        $statement->bindValue('type', $dish->getType(), \PDO::PARAM_STR);
        $statement->bindValue('price', $dish->getPrice(), \PDO::PARAM_INT);
        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        $statement->execute();
    }

    public function insert(Dish $dish): void
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (title , composition, type, price) 
                                                    VALUES (:title, :composition, :type, :price)");

        $statement->bindValue('title', $dish->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue('composition', $dish->getComposition(), \PDO::PARAM_STR);
        $statement->bindValue('type', $dish->getType(), \PDO::PARAM_STR);
        $statement->bindValue('price', $dish->getPrice(), \PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectOneDishById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchObject('App\Entity\Dish');
    }

}
