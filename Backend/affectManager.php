<?php
class AffectManager
{
    private $dbConx;
    public function __construct()
    {
        $conx = new PDO('mysql:host=127.0.0.1;dname=inventorymanagement', 'root', '');
        $this->setDbConx($conx);
    }
    public function setDbConx(PDO $PDO)
    {
        $this->dbConx = $PDO;
    }
    public function saveAffectationEquip(AffectationEquip $affEq)
    {
        try {

            // $query = $this->dbConx->prepare("INSERT INTO AffectationEqui(idAffEqu, dateAffEqu, idEqufk, idServifk, amortDuree, anneeAfk, eta, descr)
            //  VALUES (?,?,?,?,?,?,?,?)");

            $query = $this->dbConx->prepare("INSERT INTO affectationEqui(idAffEqu, dateAffEqu, idEqufk, idServifk, amortDuree, anneeAfk, eta, descr)
             VALUES (:idAffEqu, :dateAffEqu, :idEqufk, :idServifk, :amortDuree, :anneeAfk, :eta, :descr)");
            $query->bindValue(':idAffEqu', $affEq->getIdAffEqu(), PDO::PARAM_INT);
            $query->bindValue(':dateAffEqu', $affEq->getDateAffEqu());
            $query->bindValue(':idEqufk', $affEq->getIdEqufk(), PDO::PARAM_INT);
            $query->bindValue(':idServifk', $affEq->getIdServifk(), PDO::PARAM_INT);
            $query->bindValue(':amortDuree', $affEq->getAmortDuree());
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
        $request = $this->dbConx->query("SELECT * FROM affectationEquip ORDER BY idAffEqu ASC");
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $tabAff[] = new AffectationEquip($data);
        }
        return $tabAff;
    }

    public function deleteAffectationEquip($id)
    {
        $request = $this->dbCon->exec("DELETE FROM affectationEquip WHERE idAffEqu=" . $id);
    }

    // Data loading for AffectationEquip

    public function loadDesignService()
    {
        $request = $this->dbCon->query('SELECT idService, designation FROM service ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $design[] = ($data);
        }
        return $design;
    }
    public function loadAnnee()
    {
        $request = $this->dbCon->query('SELECT annee FROM annee ORDER BY annee DESC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $ane[] = ($data);
        }
        return $ane;
    }
    public function loadEquip()
    {
        $request = $this->dbCon->query('SELECT idEquipement, designation FROM Equipement ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $equi[] = ($data);
        }
        return $equi;
    }
}
