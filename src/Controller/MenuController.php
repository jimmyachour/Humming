<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\DishManager;
use App\Entity\Dish;
use App\Model\MenuManager;

class MenuController extends AbstractController
{

    /**
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $menuManager = new MenuManager();
        $menus = $menuManager->selectAllWithDishes();

        return $this->twig->render('Menu/index.html.twig', ['menus'=>$menus]);
    }
}
