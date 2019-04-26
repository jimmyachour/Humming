<?php

namespace App\Controller;


class CardAdminController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('CardAdmin/index.html.twig');
    }
}