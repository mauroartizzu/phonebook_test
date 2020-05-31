<?php
declare(strict_types=1);

use App\Domain\Phonebook\PhonebookRepository;
use App\Infrastructure\Persistence\Phonebook\DatabasePhonebookRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our PhonebookRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        PhonebookRepository::class => \DI\autowire(DatabasePhonebookRepository::class),
    ]);
};
