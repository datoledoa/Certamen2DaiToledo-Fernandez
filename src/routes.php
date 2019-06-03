<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function ($request, $response) {
		return $this->view->render($response, 'index.html');
	});

    $app->get('/porleer', function ($request, $response) {
    	$db = new \Modelo\Database($this);
		return $this->view->render($response, 'porleer.json', [
			'noticias'=>$db->noticias()
			]);
	});

	$app->get('/leidas', function ($request, $response) {
    	$db = new \Modelo\Database($this);
		return $this->view->render($response, 'noticiasLeidas.json', [
			'noticiasLeidas'=>$db->noticiasLeidas()
			]);
	});

	$app->get('/noticia/{id}', function ($request, $response,$args) {
		$db = new \Modelo\Database($this);
		return $this->view->render($response, 'noticia.json', [
			'noticiaPorId'=> $db->noticiaPorId($args["id"])
		]);
	});

	$app->get('/nuevoEstado/{id}', function ($request, $response,$args) {
		$db = new \Modelo\Database($this);
		return $this->view->render($response, 'cambiarEstado.html', [
			'cambiarEstado'=> $db->cambiarEstado($args["id"])
		]);
	});
};
