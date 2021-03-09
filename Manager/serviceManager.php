<?php
class ServiceManager
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
    public function saveService(Service $service)
    {
        // prepare() is an PDO object which consist of ...
        $query = $this->dbConx->prepare('INSERT INTO service(designation) VALUES ( :descript)');
        // $query->bindValue(':id', $service->getIdService(), PDO::PARAM_INT); //PDO::PARAM_INT refers to a PDO Class constant which specifies an Integer
        $query->bindValue(':descript', $service->getDesignation());
        $query->execute();
    }


    public function showService()
    {
        $tabServ = []; //We create an array of service
        $request = $this->dbConx->query('SELECT * FROM service ORDER BY idService'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Service, we store in the DB
            $tabServ[] = new Service($data);
        }
        return $tabServ;
    }



    public function deleteService($id)
    {
        $request = $this->dbConx->exec("DELETE FROM SERVICE WHERE idService=" . $id);
    }






    public function deleteUser($id)
    {
        $request = $this->dbConx->exec("DELETE FROM UTILISATEUR WHERE idUser=" . $id);
    }

    public function loadDesignService()
    {
        $request = $this->dbConx->query('SELECT idService, designation FROM service ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $design[] = ($data);
        }
        return $design;
    }
}
