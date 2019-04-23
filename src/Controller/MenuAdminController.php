<?php

namespace App\Controller;


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

    public function liststart()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAllByType('start');

        return $this->twig->render('MenuAdmin/listdish.html.twig', [ 'allDish' => $allDish]);
    }

    public function listbetween()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAllByType('between');

        return $this->twig->render('MenuAdmin/listdish.html.twig', [ 'allDish' => $allDish]);
    }

    public function listdessert()
    {
        $allDishManager = new DishManager();
        $allDish = $allDishManager->selectAllByType('dessert');

        return $this->twig->render('MenuAdmin/listdish.html.twig', [ 'allDish' => $allDish]);
    }
}