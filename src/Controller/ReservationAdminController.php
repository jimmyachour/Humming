<?php


namespace App\Controller;


use App\Entity\Reservation;
use App\Model\ReservationManager;

class ReservationAdminController extends AbstractController
{
    public function index()
    {
        $reservationManager = new ReservationManager();
        $reservations = $reservationManager->selectAll();

        return $this->twig->render('ReservationAdmin/index.html.twig', ['reservations' => $reservations]);
    }

    public function update(INT $id)
    {
        $reservationManager = new ReservationManager();
        $reservation = $reservationManager->selectOneById($id);

        return $this->twig->render('ReservationAdmin/update.html.twig', [ 'reservation' => $reservation, 'id' => $id]);
    }

    public function delete(INT $id)
    {
        $reservationManager = new ReservationManager();
        $reservationManager->delete($id);

        header('Location: /admin/reservation');
    }

    public function save($id = null)
    {
        $reservation = new Reservation();
        $reservation->hydrate($_POST);

        if ($reservation->isValid()) {
            if ($id) {
                $reservationManager = new ReservationManager();
                $reservationManager->update($id, $reservation);

                header('Location: /admin/reservation');
            } else {
                $reservationManager = new ReservationManager();
                $reservationManager->add($reservation);

                header('Location: /admin/reservation');
            }
        } else {
            return $reservation->errors;
        }
    }
}