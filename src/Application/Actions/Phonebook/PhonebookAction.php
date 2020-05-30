<?php
declare(strict_types=1);

namespace App\Application\Actions\Phonebook;

use App\Application\Actions\Action;
//use App\Domain\Phonebook\PhonebookRepository;
use Psr\Log\LoggerInterface;

abstract class PhonebookAction extends Action
{
    /**
     * @var PhonebookRepository
     */
    protected $phonebookRepository;

    /**
     * @param LoggerInterface $logger
     * @param PhonebookRepository  $phonebookRepository
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        //$this->phonebookRepository = $phonebookRepository;
    }
}
