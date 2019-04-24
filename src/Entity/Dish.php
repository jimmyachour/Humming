<?php
namespace App\Entity;

use App\OCTFRAM\Entity;

class Dish extends Entity
{
    private $title;
    private $composition;
    private $price;
    private $type;

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
        $this->title = $title;
    }

    /**
     * @param mixed $composition
     */
    public function setComposition($composition): void
    {
        $this->composition = $composition;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function isValid():bool
    {
        return !(empty($this->title) || empty($this->composition) || empty($this->price) || empty($this->type));
    }
}
