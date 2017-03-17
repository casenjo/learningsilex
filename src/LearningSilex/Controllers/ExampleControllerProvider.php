<?php

namespace LearningSilex\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class ExampleControllerProvider implements ControllerProviderInterface
{
    // Gets the Silex application and uses the controller factory to
    // add routes for this controller
    public function connect(Application $app)
    {
        // Get the controllers factory from Silex
        $controllers = $app['controllers_factory'];

        // Instead of adding a closure as the second argument, we point to the controller class
        // that we want handling the route in the first argument
        $controllers->get('/', 'LearningSilex\Controllers\ExampleController::index');

        return $controllers;
    }
}
