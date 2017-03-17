<?php
namespace LearningSilex\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use LearningSilex\Models\User;

class UserController
{
    public function index(Request $request, Application $app)
    {
        $u = User::find(1);
        return $app['twig']->render('user/usercontroller.html.twig', array('user' => $u));
    }

    public function create(Application $app)
    {
        return $app['twig']->render('user/create.html.twig', array());
    }
}
