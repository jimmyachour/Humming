<?php
/**
 * Created by PhpStorm.
 * User: JIMMY
 * Date: 13/04/2019
 * Time: 18:42
 */

namespace App\Model;

class DishManager extends AbstractManager
{
    const TABLE = 'dish';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
