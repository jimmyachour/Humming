<?php


namespace App\Controller;


use App\Model\DishManager;
use App\Model\MenuManager;

class CartController extends AbstractController
{
    public function index()
    {
        $allMenus = [];
        $allDish= [];

        if (isset($_SESSION['cart']['menu']) && !empty($_SESSION['cart']['menu'])) {
            $menuManager = new MenuManager();
            $dishManager = new DishManager();



            foreach ($_SESSION['cart']['menu'] as $oneMenu) {

                foreach ($oneMenu as $idMenu => $dishMenu) {
                    $menu = $menuManager->selectMenuById($idMenu);

                    foreach ($dishMenu as $type => $idDish) {
                        $method = 'setList' . $type;
                        $menu->$method($dishManager->selectOneDishById($idDish));
                    }
                }
                $allMenus[] = $menu;
            }
        }


        if (isset($_SESSION['cart']['dish']) && !empty($_SESSION['cart']['dish'])) {
            $dishManager = new DishManager();

            foreach ($_SESSION['cart']['dish'] as $idDish) {
                 $allDish[] =$dishManager->selectOneDishById($idDish);

            }
        }

        return $this->twig->render('Cart/index.html.twig', ['allMenus' => $allMenus, 'allDish' => $allDish]);
    }

    public function remove($typeDish, $type, $idOder)
    {

    }

}