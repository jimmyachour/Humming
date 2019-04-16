<?php

namespace App\Controller;


class MenuAdminController extends AbstractController
{
    public function menu()
    {

        return $this->twig->render('MenuAdmin/index.html.twig');
    }
}