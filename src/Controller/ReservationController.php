<?php

namespace App\Controller;

use App\Entity\Reservation;
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

        $reservation = new Reservation();
        $reservation->hydrate($_POST);

        $reservationManager = new ReservationManager();

        $reservationManager->add($reservation);

        header('Location:/reservation/request/?resa=success');
        exit();
    }
}
