<?php
namespace LearningSilex\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function index(Request $request, Application $app)
    {
        return $app['twig']->render('user/usercontroller.html.twig', array());
    }
}
