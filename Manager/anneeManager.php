<?php
class AnneeManager
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

    public function saveAnnee(Annee $annee)
    {
        // prepare() is an PDO object which consist of to create a prepared request or statement
        $query = $this->dbConx->prepare('INSERT INTO annee(annee) VALUES (:annee)');
        $query->bindValue(':annee', $annee->getAnnee(), PDO::PARAM_INT); //PDO::PARAM_INT refers to a PDO Class constant which specifies an Integer
        $query->execute();
    }

    public function showAnnee()
    {
        $tabAnnee = []; //We create an array of annee
        $request = $this->dbConx->query('SELECT * FROM annee ORDER BY annee ASC'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Annee, we store it in the DB
            $tabAnnee[] = new Annee($data);
        }
        return $tabAnnee;
    }
    public function deleteAnnee($id)
    {
        $request = $this->dbConx->exec("DELETE FROM ANNEE WHERE idAnnee=" . $id);
    }
}
