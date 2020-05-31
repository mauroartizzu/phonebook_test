<?php
declare(strict_types=1);

namespace App\Domain\Phonebook;

use JsonSerializable;

class Phonebook implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $phone;

    /**
     * @param int|null  $id
     * @param string    $firstName
     * @param string    $lastName
     * @param string    $phone
     */
    public function __construct(?int $id, string $firstName, string $lastName, string $phone)
    {
        $this->id = $id;
        $this->firstName = ucfirst($firstName);
        $this->lastName = ucfirst($lastName);
        $this->phone = $phone;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
        ];
    }
}
