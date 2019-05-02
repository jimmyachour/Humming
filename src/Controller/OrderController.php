<?php


namespace App\Controller;


use App\Entity\Dish;
use App\Entity\Menu;
use App\Model\DishManager;
use App\Model\MenuDishManager;
use App\Model\MenuManager;

class OrderController extends AbstractController
{
    public function index()
    {
        $menuManager = new MenuManager();
        $menuDishManager = new MenuDishManager();

        $allMenus = $menuManager->selectAllActive();

        foreach ($allMenus as $menu) {

            $allDishes = $menuDishManager->selectAllDishOfOneMenu($menu->id);
            $menu->repartitionOfDish($allDishes);
        }

        return $this->twig->render('Order/listMenu.html.twig', ['allMenus' => $allMenus]);
    }


    public function by(string $type)
    {

        $dishManager = new DishManager();
        $dishs = $dishManager->selectAllByType($type);


        return $this->twig->render('Order/listDish.html.twig', ['dishs' => $dishs]);
    }

    public function add(STRING $type, INT $idOrder)
    {
        if (!empty($_POST)) {
            if ($type == 'menu') {
                $_SESSION['cart']['menu'][] = [$idOrder => $_POST] ;
                header('Location: /order/');
            }
        } else {
            $_SESSION['cart']['dish'][] = $idOrder;
            header('Location: /order/by/type/start/');
        }
    }

    public function request()
    {
        $notification = null;
        if (isset($_GET['success']) && $_GET['success']=='ok') {
            $notification = "Votre est bien passé !";
        }
        return $this->twig->render('Order/index.html.twig', ['notification' => $notification]);
    }

    public function command()
    {
        unset($_SESSION['cart']);

        return $this->twig->render('Order/valid.html.twig');
    }
}