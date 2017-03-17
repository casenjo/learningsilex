<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage');

// Basic GET example with new Twig template
$app->get('/basicget', function () use ($app) {
    return $app['twig']->render('basicget.html.twig', array());
})
->bind('basicget');

// Basic GET example with parameters in the URL
$app->get('/getwithparams/{firstValue}/{secondValue}', function ($firstValue, $secondValue) use ($app) {
    return $app['twig']->render('getwithparams.html.twig', array('firstValue' => $firstValue, 'secondValue' => $secondValue));
})
->bind('getwithparams');

// Basic POST example
$app->get('/basicpost', function () use ($app) {
    return $app['twig']->render('basicpost.html.twig', array());
})
->bind('basicpost');
$app->post('/basicpost', function (Request $request) use ($app) {
    $firstName = $request->get('firstName');
    $lastName = $request->get('lastName');
    return $app['twig']->render('basicpost.html.twig', array('firstName' => $firstName, 'lastName' => $lastName));
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
