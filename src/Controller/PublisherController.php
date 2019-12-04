<?php


namespace m2i\MonProjet\Controller;


use DI\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PublisherController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * PublisherController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function showOne(RequestInterface $requete, ResponseInterface $response, $args){
        $publisher = $args["id"];
        $currentPublisher = $this->container->get("publisherDAO")->findOneById($publisher);
        $response->getBody()->write("Hello vous êtes l'éditeur : {$currentPublisher["NAME"]}");
        return $response;
    }


}