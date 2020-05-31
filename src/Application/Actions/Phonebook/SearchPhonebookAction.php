<?php
declare(strict_types=1);

namespace App\Application\Actions\Phonebook;

use App\Domain\Phonebook\Phonebook;
use Psr\Http\Message\ResponseInterface as Response;

class SearchPhonebookAction extends PhonebookAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $phone = (string) $this->resolveArg('phone');
        // $record = new Phonebook(null, 'Mario', 'Rossi', '123456')
        $record = $this->phonebookRepository->findByPhone($phone);

        return $this->respondWithData([
            'id' => $record->getId(),
            'first_name' => $record->getLastName(),
            'last_name' => $record->getFirstName(),
            'phone' => $record->getPhone(),
            ]);

    }
}
