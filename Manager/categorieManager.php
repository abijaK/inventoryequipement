<?php
class CategorieManager
{
    private $dbConx;

    public function __construct()
    {
        // This is the good way because these info are sensible to be stored dangereously in the scripts
        $con = new PDO('mysql:host=localhost;dbname=inventorymanagement', 'root', '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setDbConx($con);
    }

    public function setDbConx(PDO $PDO)
    {
        $this->dbConx = $PDO;
    }

    public function saveCat(Categorie $cat)
    {
        // prepare() is an PDO object which consist of to create a prepared request or statement
        $query = $this->dbConx->prepare('INSERT INTO categorie(designation) VALUES (:design)');
        $query->bindValue(':design', $cat->getDesignation(), PDO::PARAM_STR); //PDO::PARAM_STR refers to a PDO Class constant which specifies an String
        $query->execute();
    }

    public function showCategorie()
    {
        $tabCateg = []; //We create an array of annee
        $request = $this->dbConx->query('SELECT * FROM categorie ORDER BY designation ASC'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Categorie, we store it in the DB
            $tabCateg[] = new Categorie($data);
        }
        return $tabCateg;
    }
    public function deleteCategorie($id)
    {
        $request = $this->dbConx->exec("DELETE FROM CATEGORIE WHERE idCategorie=" . $id);
    }
}
