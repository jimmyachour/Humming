<?php

namespace App\Controller;

use App\Model\ClientManager;
use App\Entity\Client;
use App\Model\ReservationManager;

class ReservationController extends AbstractController
{
    public function request()
    {
        $notification = null;
        if (isset($_GET['resa']) && $_GET['resa']=='success') {
            $notification = "Votre reservation est enregistrée !";
        }
        return $this->twig->render('Reservation/index.html.twig', ['notification' => $notification]);
    }

    public function add()
    {
        $reservationManager = new ReservationManager();

        $reservationManager->add($_POST);

        header('Location:/reservation/request/?resa=success');
        exit();
    }
}
