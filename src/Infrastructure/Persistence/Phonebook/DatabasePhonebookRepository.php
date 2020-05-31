<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Phonebook;

use App\Domain\Phonebook\Phonebook;
use App\Domain\Phonebook\PhonebookNotFoundException;
use App\Domain\Phonebook\PhonebookRepository;
use Psr\Log\LoggerInterface;

class DatabasePhonebookRepository implements PhonebookRepository
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * @var Phonebook[]
     */
    private $phonebooks;

    /**
     * DatabasePhonebookRepository constructor.
     *
     * @param array|null $phonebooks
     */
    public function __construct(LoggerInterface $logger, \PDO $pdo)
    {
        $this->logger = $logger;
        $this->pdo = $pdo;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->phonebooks);
    }

    /**
     * {@inheritdoc}
     */
    public function findByPhone(string $phone): Phonebook
    {
        $normalizedPhone = strrev($phone);

        $query = "SELECT * FROM phonebook WHERE phone LIKE ? LIMIT 1";
        $sth = $this->pdo->prepare($query);
        $sth->execute(["$normalizedPhone%"]);
        $records = $sth->fetchAll();
        
        if (sizeof($records) < 1) {
             throw new PhonebookNotFoundException();
        }

        $this->phonebooks = array_map(function($item) {
            return new Phonebook(null, $item['first_name'], $item['last_name'], $item['phone']);
        }, $records);
        
        return $this->phonebooks[0];
    }
}
