<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Model\DishManager;
use App\Model\MenuDishManager;
use App\Model\MenuManager;

class MenuAdminController extends AbstractController
{
    public function list()
    {
        $menuManager = new MenuManager();
        $allMenu = $menuManager->selectAll();

        return $this->twig->render('MenuAdmin/list.html.twig', ['allMenu' => $allMenu]);
    }
  
    public function listDish(INT $idMenu, string $type)
    {
        $menuDishManager = new MenuDishManager();
        $listIdMenu = $menuDishManager->selectAllDishIdOfMenu($idMenu);

        $dishManager = new DishManager();

        if (!empty($listIdMenu)) {
            $listDish = $dishManager->selectWithoutDishOfMenuByType($listIdMenu, $type);
        } else {
            $listDish = $dishManager->selectAllByType($type);
        }

        return $this->twig->render('DishAdmin/checkboxListDish.html.twig', [
            'listDish' => $listDish,
            'idMenu' =>  $idMenu,
            'type' => $type
        ]);
    }

    public function addDish(INT $idMenu)
    {
        if (!empty($_POST)) {
            $menuDishManager = new MenuDishManager();
            $menuDishManager->addDish($idMenu, $_POST['id']);
        }

        header('Location: /admin/menu/update/' . $idMenu);
    }

    public function update(INT $id)
    {
        $menuManager = new MenuManager();
        $menu = $menuManager->selectMenuById($id);

        $menuDishManager = new MenuDishManager();
        $dishOfMenu = $menuDishManager->selectAllDishOfOneMenu($id);

        $menu->repartitionOfDish($dishOfMenu);

        $dishManager = new DishManager();
        $allDishs = $dishManager->selectAll();

        return $this->twig->render('MenuAdmin/update.html.twig', ['menu' => $menu,'allDishs' => $allDishs]);
    }

    public function remove(INT $menuId, INT $dishId)
    {
        $menuDishManager = new MenuDishManager();
        $menuDishManager->removeDishOfMenu($menuId, $dishId);

        header('Location: /admin/menu/update/' . $menuId);
    }

    public function save($id = null)
    {
        $menu = new Menu();
        $menu->hydrate($_POST);

        if ($menu->isValid()) {
            if ($id) {
                $menuManager = new MenuManager();
                $menuManager->updateTitleAndPrice($id, $menu);

                header('Location: /admin/menu/list');
            } else {
                $menuManager = new MenuManager();
                $menuManager->insertTitleAndPrice($menu);

                header('Location: /admin/menu/list');
            }
        } else {
            return $menu->errors;
        }
    }
}
