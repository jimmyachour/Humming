<?php

namespace App\Controller;

use App\Model\DishManager;
use App\Entity\Dish;

class DishAdminController extends AbstractController
{
    public function list()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAll();

        $notification = null;

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
            } else {
                $dishManager = new DishManager();
                $dishManager->insert($dish);
            }
                header('Location: /admin/dish/list/?save=success');
        } else {
            return $dish->errors;
        }
    }
}
