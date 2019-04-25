<?php
namespace App\Entity;

class Dish extends Entity
{
    private $title;
    private $composition;
    private $price;
    private $type;

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
    public function getComposition()
    {
        return $this->composition;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        if (!empty($title)) {
            $this->title = $title;
        } else {
            $this->errors['title'] = 'Merci de saisir un titre de plat';
        }
    }

    /**
     * @param mixed $composition
     */
    public function setComposition($composition): void
    {
        if (!empty($composition)) {
            $this->composition = $composition;
        } else {
            $this->errors['composition'] = 'Merci de saisir une composition de plat';
        }
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        if (!empty($type)) {
            $this->type = $type;
        } else {
            $this->errors['type'] = 'Merci de selectionner un type de plat';
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
            $this->errors['price'] = 'Merci de saisir un prix à votre plat';
        }
    }

    /**
     * @return bool
     */
    public function isValid():bool
    {
        return !(empty($this->title) || empty($this->composition) || empty($this->price) || empty($this->type));
    }
}
