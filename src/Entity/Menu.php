<?php

namespace App\Entity;

class Menu extends Entity
{
    private $title;
    private $price;
    private $status;
    private $listStart = [];
    private $listBetween = [];
    private $listDessert = [];

    public $errors = [];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getListStart(): array
    {
        return $this->listStart;
    }

    /**
     * @return array
     */
    public function getListBetween(): array
    {
        return $this->listBetween;
    }

    /**
     * @return array
     */
    public function getListDessert(): array
    {
        return $this->listDessert;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        if (!empty($title)) {
            $this->title = $title;
        } else {
            $this->errors['title'] = 'Merci de saisir un titre de Menu';
        }
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        if (!empty($price)) {
            $this->price = $price;
        } else {
            $this->errors['price'] = 'Merci de saisir un prix à votre Menu';
        }
    }

    /**
     * @param Dish $start
     */
    public function setListStart(Dish $start): void
    {
        $this->listStart[] = $start;
    }

    /**
     * @param Dish $between
     */
    public function setListBetween(Dish $between): void
    {
        $this->listBetween[] = $between;
    }

    /**
     * @param Dish $dessert
     */
    public function setListDessert(Dish $dessert): void
    {
        $this->listDessert[] = $dessert;
    }

    /**
     * @param mixed $statue
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * Repartition dish in different type
     * @param $dishOfMenu
     */
    public function repartitionOfDish(array $dishOfMenu):void
    {
        foreach ($dishOfMenu as $dish) {
            $method = 'setList' . ucfirst($dish->getType());
            $this->$method($dish);
        }
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return !(empty($this->title) || empty($this->price));
    }
}
