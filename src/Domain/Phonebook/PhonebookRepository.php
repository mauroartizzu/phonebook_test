<?php
declare(strict_types=1);

namespace App\Domain\Phonebook;

interface PhonebookRepository
{
    /**
     * @return Phonebook[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Phonebook
     * @throws PhonebookNotFoundException
     */
    public function findByPhone(string $phone): Phonebook;
}
