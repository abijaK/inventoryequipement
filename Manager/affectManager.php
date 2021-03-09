<?php
class AffectManager
{
    private $dbConx;
    public function __construct()
    {
        $conx = new PDO('mysql:host=127.0.0.1;dbname=inventorymanagement', 'root', '');
        $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $conx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setDbConx($conx);
    }
    public function setDbConx(PDO $PDO)
    {
        $this->dbConx = $PDO;
    }
    public function saveAffectationEquip(AffectationEquip $affEq)
    {
        try {

            $query = $this->dbConx->prepare("INSERT INTO affectationequip( dateAffEqu, idEqufk, idServifk, amortDuree, anneeAfk, eta, descr)
             VALUES (:dateAffEqu, :idEqufk, :idServifk, :amortDuree, :anneeAfk, :eta, :descr)");
            $query->bindValue(':dateAffEqu', $affEq->getDateAffEqu());
            $query->bindValue(':idEqufk', $affEq->getIdEqufk(), PDO::PARAM_INT);
            $query->bindValue(':idServifk', $affEq->getIdServifk(), PDO::PARAM_INT);
            $query->bindValue(':amortDuree', $affEq->getAmortDuree(), PDO::PARAM_INT);
            $query->bindValue(':anneeAfk', $affEq->getAnneeAfk());
            $query->bindValue(':eta', $affEq->getEta());
            $query->bindValue(':descr', $affEq->getDescr());
            $query->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function showAffectationEquip()
    {
        $tabAff = [];
        $request = $this->dbConx->query("SELECT idAffEqu,dateAffEqu, equipement.designation as equip, 
        service.designation as service, amortDuree, anneeAfk, eta, descr FROM affectationEquip
        INNER JOIN service ON idService=idServifk INNER JOIN equipement ON idEquipement=idEqufk ORDER BY idAffEqu ASC");
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {

            $tabAff[] = $data;
        }
        return $tabAff;
    }

    public function deleteAffectationEquip($idAffEqu)
    {
        $request = $this->dbConx->exec("DELETE FROM affectationEquip WHERE idAffEqu=" . $idAffEqu);
    }

    // Data loading for AffectationEquip

    public function loadDesignService()
    {
        $request = $this->dbConx->query('SELECT idService, designation FROM service ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $design[] = ($data);
        }
        return $design;
    }
    public function loadAnnee()
    {
        $request = $this->dbConx->query('SELECT annee FROM annee ORDER BY annee DESC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $ane[] = ($data);
        }
        return $ane;
    }
    public function loadEquip()
    {
        $request = $this->dbConx->query('SELECT idEquipement, designation FROM Equipement ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $equi[] = ($data);
        }
        return $equi;
    }
}
