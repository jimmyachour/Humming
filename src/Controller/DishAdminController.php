<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Model\DishManager;

class DishAdminController extends AbstractController
{
    public function list()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAll();

        return $this->twig->render('DishAdmin/list.html.twig', [ 'allDish' => $allDish]);
    }

    public function dish($id)
    {
        $dishManager = new DishManager();
        $dish = $dishManager->selectOneById($id);

        return $this->twig->render('DishAdmin/form.html.twig', ['dish' => $dish]);
    }

    public function listBY($type)
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAllByType($type);

        return $this->twig->render('DishAdmin/list.html.twig', [ 'allDish' => $allDish]);
    }

    public function create()
    {
        return $this->twig->render('DishAdmin/form.html.twig');
    }

    public function update($id)
    {
        $dishManager = new DishManager();
        $dish = $dishManager->selectOneById($id);

        return $this->twig->render('DishAdmin/form.html.twig', [ 'dish' => $dish]);
    }

    public function delete($id)
    {
        header('Location: /admin/dish/list');

        $dishManager = new DishManager();
        $dishManager->delete($id);
    }

    public function save($id = null)
    {
        $dish = new Dish();
        $dish->hydrate($_POST);

        if ($dish->isValid()) {
            if ($id) {
                $dishManager = new DishManager();
                $dishManager->update($id, $dish);

                header('Location: /admin/dish/list');
            } else {
                $dishManager = new DishManager();
                $dishManager->insert($dish);

                header('Location: /admin/dish/list');
            }
        } else {
            return $dish->errors;
        }
    }
}