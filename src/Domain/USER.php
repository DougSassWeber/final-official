<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 10:25 PM
 */

namespace Domain;

class USER {
    protected $userId;
    protected $alias;
    protected $email;

    function __construct($alias,$email)
    {
        if (!is_string($alias)){
            return false;
        }elseif (!is_string($alias)) {
            return false;
        }elseif (!contains($email,"@")) {
            return false;
        }
        $this->alias = $alias;
        $this->email = $email;
        return true;
    }

    /**
     * @return mixed
     */
    public function UserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function Alias()
    {
        return $this->alias;
    }

    /**
     * @return mixed
     */
    public function Email()
    {
        return $this->email;
    }
}