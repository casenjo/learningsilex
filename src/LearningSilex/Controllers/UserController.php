<?php
namespace LearningSilex\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use LearningSilex\Models\User;

class UserController
{
    public function index(Request $request, Application $app)
    {
        $users = User::all();
        return $app['twig']->render('user/usercontroller.html.twig', array('users' => $users));
    }

    public function create(Application $app)
    {
        return $app['twig']->render('user/create.html.twig', array());
    }

    public function store(Request $request, Application $app)
    {
        $u = new User;
        $u->first_name = $request->get('firstName');
        $u->last_name = $request->get('lastName');
        $u->save();
        return $app->redirect('/index_dev.php/controllers/user');
    }
}
