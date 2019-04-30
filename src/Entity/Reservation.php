<?php


namespace App\Entity;


class Reservation extends Entity
{
    private $reservDate;
    private $reservTime;
    private $reservNbr;
    private $reservLastname;
    private $reservFirstname;
    private $reservMail;
    private $reservPhone;

    public $errors = [];

    /**
     * @return mixed
     */
    public function getReservDate()
    {
        return $this->reservDate;
    }

    /**
     * @return mixed
     */
    public function getReservTime()
    {
        return $this->reservTime;
    }

    /**
     * @return mixed
     */
    public function getReservNbr()
    {
        return $this->reservNbr;
    }

    /**
     * @return mixed
     */
    public function getReservLastname()
    {
        return $this->reservLastname;
    }

    /**
     * @return mixed
     */
    public function getReservFirstname()
    {
        return $this->reservFirstname;
    }

    /**
     * @return mixed
     */
    public function getReservMail()
    {
        return $this->reservMail;
    }

    /**
     * @return mixed
     */
    public function getReservPhone()
    {
        return $this->reservPhone;
    }

    /**
     * @param mixed $reservDate
     */
    public function setReservDate($reservDate): void
    {
        $this->reservDate = $reservDate;
    }

    /**
     * @param mixed $reservTime
     */
    public function setReservTime($reservTime): void
    {
        $this->reservTime = $reservTime;
    }

    /**
     * @param mixed $reservNbr
     */
    public function setReservNbr($reservNbr): void
    {
        $this->reservNbr = $reservNbr;
    }

    /**
     * @param mixed $reservLastname
     */
    public function setReservLastname($reservLastname): void
    {
        $this->reservLastname = $reservLastname;
    }

    /**
     * @param mixed $reservFirstname
     */
    public function setReservFirstname($reservFirstname): void
    {
        $this->reservFirstname = $reservFirstname;
    }

    /**
     * @param mixed $reservMail
     */
    public function setReservMail($reservMail): void
    {
        $this->reservMail = $reservMail;
    }

    /**
     * @param mixed $reservPhone
     */
    public function setReservPhone($reservPhone): void
    {
        $this->reservPhone = $reservPhone;
    }

    /**
     * @return bool
     */
    public function isValid():bool
    {
        return !(empty($this->reservDate) || empty($this->reservTime) || empty($this->reservNbr) || empty($this->reservLastname) || empty($this->reservFirstname) || empty($this->reservMail) || empty($this->reservPhone));
    }
}