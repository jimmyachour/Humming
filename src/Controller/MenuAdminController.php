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
        $allDish = new DishManager();
        $allDish = $allDish->selectAll();



        return $this->twig->render('MenuAdmin/listdish.html.twig',[ 'allDish' => $allDish]);
    }
}