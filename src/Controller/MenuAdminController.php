<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Model\DishManager;

class MenuAdminController extends AbstractController
{
    public function index()
    {

        return $this->twig->render('MenuAdmin/index.html.twig');
    }

    public function listmenu()
    {
        return $this->twig->render('MenuAdmin/listmenu.html.twig');
    }

    public function listdish()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAll();

        return $this->twig->render('MenuAdmin/listdish.html.twig', [ 'allDish' => $allDish]);
    }

    public function dish($id)
    {
        $dishManager = new DishManager();
        $dish = $dishManager->selectOneById($id);

        return $this->twig->render('MenuAdmin/dishForm.html.twig', ['dish' => $dish]);
    }

    public function dishDelete($id)
    {
        header('Location: /admin/menu/listdish');

        $dishManager = new DishManager();
        $dishManager->delete($id);
    }

    public function list($type)
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAllByType($type);

        return $this->twig->render('MenuAdmin/listdish.html.twig', [ 'allDish' => $allDish]);
    }

    public function dishUpdate($id)
    {
        $dishManager = new DishManager();
        $dish = $dishManager->selectOneById($id);

        return $this->twig->render('MenuAdmin/dishForm.html.twig', [ 'dish' => $dish]);
    }

    public function dishCreate()
    {
        return $this->twig->render('MenuAdmin/dishForm.html.twig');
    }

    public function save($id = null)
    {
        $dish = new Dish();
        $dish->hydrate($_POST);

        if ($dish->isValid()) {
            if ($id) {
                $dishManager = new DishManager();
                $dishManager->update($id, $dish);

                header('Location: /admin/menu/listdish');
            } else {
                $dishManager = new DishManager();
                $dishManager->insert($dish);

                header('Location: /admin/menu/listdish');
            }
        } else {
            return $dish->errors;
        }
    }
}