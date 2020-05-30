<?php
declare(strict_types=1);

namespace App\Application\Actions\Phonebook;

use Psr\Http\Message\ResponseInterface as Response;
use Faker\Factory;
use League\Csv\Writer;

class GeneratePhonebookAction extends PhonebookAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        set_time_limit(0);
        $header = ['id', 'first_name', 'last_name', 'phone'];
        
        $csv = Writer::createFromPath('./file.csv', 'w+');
        $csv->insertOne($header);

        foreach ($this->generateCSV() as $record) {
            $csv->insertOne($record);
        }
        
        return $this->respondWithData("ok");
    }

    private function generateCSV()
    {
        for ($i=0;$i<3000000;$i++) {
            $faker = Factory::create();
            $record = [$i+1, $faker->firstName, $faker->lastName, $faker->unique()->phoneNumber];
            yield $record;
        }

        return;
    }
}
