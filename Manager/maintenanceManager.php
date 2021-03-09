<?php
class MaintenanceManager
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

    public function saveMaint(Maintenance $mainte)
    {
        $query = $this->dbConx->prepare('INSERT INTO maintenance (dateMaintenance, motif, description, operateur, idAffectationfk) VALUES (:dateMaint, :motif, :descript, :opera, :idAffectfk)');
        $query->bindValue(':dateMaint', $mainte->getDateMaintenance());
        $query->bindValue(':motif', $mainte->getMotif());
        $query->bindValue(':descript', $mainte->getDescription());
        $query->bindValue(':opera', $mainte->getOperateur());
        $query->bindValue(':idAffectfk', $mainte->getIdAffectationfk());
        $query->execute();
        // var_dump($query->execute());
    }

    public function showMaintenance()
    {
        $tabMaint = []; //We create an array of maintenance
        //SELECT idMaintenance, dateMaintenance, motif, description, operateur, equipement.designation AS idAffectationfk 
        // FROM maintenance INNER JOIN equipement ON  ORDER BY idMaintenance

        $request = $this->dbConx->query('SELECT idMaintenance, dateMaintenance, motif, maintenance.description, operateur, equipement.designation AS idAffectationfk 
        FROM maintenance INNER JOIN equipement ON equipement.designation = maintenance.idAffectationfk ORDER BY idMaintenance');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $tabMaint[] = new Maintenance($data);
        }
        return $tabMaint;
    }
    public function loadAffectfk()
    {
        $request = $this->dbConx->query("SELECT equipement.designation FROM equipement ORDER BY equipement.designation ASC");
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $mainte[] = ($data);
        }
        return $mainte;
        var_dump($mainte);
    }
    public function deleteMaintenance($id)
    {
        $request = $this->dbConx->exec("DELETE FROM MAINTENANCE WHERE idMaintenance=" . $id);
    }
}
