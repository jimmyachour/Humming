<?php

namespace App\Entity;

/**
 * Class Client
 * @package App\Entity
 */
class Client extends Entity
{
    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $phone;
    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return Client
     */
    public function setLastname(string $lastname): Client
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Client
     */
    public function setFirstname(string $firstname): Client
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Client
     */
    public function setMail(string $mail): Client
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Client
     */
    public function setPhone(string $phone): Client
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Client
     */
    public function setMessage(string $message): Client
    {
        $this->message = $message;
        return $this;
    }
}
