<?php
//je nomme comme je veux
namespace M2i\monProjet\Model;

class PublisherDAO
{

    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * PublisherDAO constructor.
     * @param \PDO $pdo
     */
    function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOneById($id){
        $statement = $this->pdo->prepare("SELECT * FROM publishers WHERE id=?");
        $statement->execute([$id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

}