<?php
namespace LearningSilex\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ExampleController
{
    // Called by the controller provider class itself to the route specified
    public function index(Request $request, Application $app)
    {
        // Render whichever view we want :)
        return $app['twig']->render('controller.html.twig', array());
    }
}
