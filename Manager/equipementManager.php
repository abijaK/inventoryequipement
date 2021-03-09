<?php
class EquipementManager
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

    public function saveEquip(Equipement $equip)
    {
        $query = $this->dbConx->prepare('INSERT INTO equipement ( designation, model, marque, categoriefk, dateAcquisition, description)
         VALUES ( :design, :model, :marque, :categfk, :dateAcqui, :descript)');
        $query->bindValue(':design', $equip->getDesignation());
        $query->bindValue(':model', $equip->getModel());
        $query->bindValue(':marque', $equip->getMarque());
        $query->bindValue(':categfk', $equip->getCategoriefk());
        $query->bindValue(':dateAcqui', $equip->getDateAcquisition());
        $query->bindValue(':descript', $equip->getDescription());
        $query->execute();
    }

    public function showEquipement()
    {
        $tabEquip = []; //We create an array of service

        $request = $this->dbConx->query('SELECT idEquipement, equipement.designation, model, marque,
         categorie.designation AS categoriefk, dateAcquisition, description 
        FROM equipement INNER JOIN categorie ON (categorie.designation=equipement.categoriefk) ORDER BY idEquipement ASC');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $tabEquip[] = new Equipement($data);
            // $equip[] = $data;
        }
        return $tabEquip;
        // var_dump($request);
    }

    public function deleteEquipement($id)
    {
        $request = $this->dbConx->exec("DELETE FROM EQUIPEMENT WHERE idEquipement=" . $id);
    }

    public function loadCat()
    {
        $request = $this->dbConx->query('SELECT designation FROM categorie ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $cate[] = ($data);
        }
        return $cate;
    }
}
