<?php


//création d'une constante nommée ROOT_PATH qui pointe sur le chemin racine du projet modern-php
use M2i\monProjet\Model\PublisherDAO;
use Slim\Factory\AppFactory;
use m2i\MonProjet\Controller\PublisherController;

define("ROOT_PATH", dirname(__DIR__));

require ROOT_PATH . "/vendor/autoload.php";

//Création du conteneur de dépendances
$container = new \DI\Container();
AppFactory::setContainer($container);

$app = AppFactory::create();

//création d'une dépendance
$container->set("pdo", function(){
    //Définition de la connexion
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "", [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    return $pdo;
});

//création d'une dépendance
$container->set("publisherDAO", function() use ($container){
    //Instanciation du DAO
    $publisherDAO = new PublisherDAO($container->get("pdo"));
    return $publisherDAO;
});

$app->get("/{name}", function (Psr\Http\Message\RequestInterface $request, Psr\Http\Message\ResponseInterface $response, $args){
    $name = $args["name"];
    $response->getBody()->write("Hello $name");
    return $response;
});

$app->get("/publisher/{id}", PublisherController::class . ":showOne");

$app->run();
