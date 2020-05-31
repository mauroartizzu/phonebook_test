<?php
declare(strict_types=1);

namespace App\Domain\Phonebook;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PhonebookNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The record you requested does not exist.';
}
