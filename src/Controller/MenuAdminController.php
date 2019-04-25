<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Model\DishManager;

class MenuAdminController extends AbstractController
{
    public function listmenu()
    {
        return $this->twig->render('MenuAdmin/list.html.twig');
    }
}