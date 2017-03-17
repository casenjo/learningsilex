<?php

namespace LearningSilex\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class UserControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'LearningSilex\Controllers\UserController::index');

        return $controllers;
    }
}
