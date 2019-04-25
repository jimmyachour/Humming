<?php

namespace App\Entity;

abstract class Entity
{
    public function hydrate($data):void
    {
        foreach ($data as $key => $value) {
            if ($value != '') {
                $method = 'set'.ucfirst($key);
                if (is_callable([$this, $method])) {
                    $this->$method($value);
                }
            }
        }
    }
}