<?php

namespace App\Controller;

use App\Model\ClientManager;
use App\Entity\Client;

class ContactController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Contact/index.html.twig');
    }

    public function add()
    {
        $client = new Client();
        $clientManager = new ClientManager('client');

        $client->hydrate($_POST);

        $clientManager->add($_POST);

        header('Location:/contact/success');
    }

    public function success()
    {
        return $this->twig->render('Contact/success.html.twig');
    }
}