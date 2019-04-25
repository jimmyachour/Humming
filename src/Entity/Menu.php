<?php

namespace App\Entity;

use App\OCTFRAM\Entity;


class Menu extends Entity
{
    private $title;
    private $price;
    private $listDish = [];

    private $errors = [];

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
     * @return array
     */
    public function getListDish(): array
    {
        return $this->listDish;
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
     * @param array $listDish
     */
    public function setListDish(array $listDish): void
    {
        if (!empty($listDish)) {
            $this->listDish = $listDish;
        } else {
            $this->errors['listDish'] = 'De selectionner au moins un plat à votre Menu';
        }
    }
}