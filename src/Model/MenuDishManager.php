<?php


namespace App\Model;

class MenuDishManager extends AbstractManager
{
    const TABLE = 'menu_dish';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectAllDishOfOneMenu(INT $id)
    {
        $statement =
            $this->pdo->prepare("SELECT * FROM $this->table as md INNER JOIN dish as d ON md.dish_id= d.id  
                                          WHERE menu_id=:id");

        $statement->bindValue('id', $id, \PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Dish');
    }

    public function removeDishOfMenu(INT $menuId, INT $dishId):void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE menu_id=:menuId AND dish_id=:dishId");

        $statement->bindValue('menuId', $menuId, \PDO::PARAM_INT);
        $statement->bindValue('dishId', $dishId, \PDO::PARAM_INT);

        $statement->execute();
    }

    public function selectAllDishIdOfMenu($idMenu):array
    {
        $statement = $this->pdo->prepare("SELECT dish_id FROM $this->table WHERE menu_id=:id");

        $statement->bindValue('id', $idMenu, \PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addDish(INT $idMenu, array $idDishs):void
    {
        foreach ($idDishs as $idDish) {
            $statement = $this->pdo->prepare("INSERT INTO $this->table (menu_id , dish_id) VALUES (:menu_id,:dish_id)");

            $statement->bindValue('menu_id', $idMenu, \PDO::PARAM_INT);
            $statement->bindValue('dish_id', $idDish, \PDO::PARAM_INT);

            $statement->execute();
        }
    }
}
