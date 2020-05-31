<?php
declare(strict_types=1);

use App\Application\Actions\Phonebook\GeneratePhonebookAction;
use App\Application\Actions\Phonebook\SearchPhonebookAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->group('/phonebook', function (Group $group) {
        $group->get('/generate', GeneratePhonebookAction::class);
        $group->get('/search/{phone}', SearchPhonebookAction::class);
    });

};
