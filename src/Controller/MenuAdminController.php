<?php

namespace App\Controller;

use App\Model\MenuManager;

class MenuAdminController extends AbstractController
{
    public function list()
    {
        $menuManager = new MenuManager();
        $allMenu = $menuManager->selectAll();

        return $this->twig->render('MenuAdmin/list.html.twig', ['allMenu' => $allMenu]);
    }
}