<?php
class ServiceManager
{
    private $dbCon;

    public function __construct()
    {
        // This is the good way because these info are sensible to be stored dangereously in the scripts
        $con = new PDO('mysql:host=localhost;dbname=inventorymanagement', 'root', '');
        $this->setDbCon($con);
    }

    public function setDbCon(PDO $PDO)
    {
        $this->dbCon = $PDO;
    }
    public function saveService(Service $service)
    {
        // prepare() is an PDO object which consist of ...
        $query = $this->dbCon->prepare('INSERT INTO service(idService,designation) VALUES (:id, :descript)');
        $query->bindValue(':id', $service->getIdService(), PDO::PARAM_INT); //PDO::PARAM_INT refers to a PDO Class constant which specifies an Integer
        $query->bindValue(':descript', $service->getDesignation());
        $query->execute();
    }


    public function showService()
    {
        $service = []; //We create an array of service
        $request = $this->dbCon->query('SELECT * FROM service ORDER BY idService'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Service, we store in the DB
            $service[] = new Service($data);
        }
        return $service;
    }

    public function saveAnnee(Annee $annee)
    {
        // prepare() is an PDO object which consist of to create a prepared request or statement
        $query = $this->dbCon->prepare('INSERT INTO annee(annee) VALUES (:annee)');
        $query->bindValue(':annee', $annee->getAnnee(), PDO::PARAM_INT); //PDO::PARAM_INT refers to a PDO Class constant which specifies an Integer
        $query->execute();
    }

    public function showAnnee()
    {
        $tabAnnee = []; //We create an array of annee
        $request = $this->dbCon->query('SELECT * FROM annee ORDER BY annee ASC'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Annee, we store it in the DB
            $tabAnnee[] = new Annee($data);
        }
        return $tabAnnee;
    }

    public function saveCat(Categorie $cat)
    {
        // prepare() is an PDO object which consist of to create a prepared request or statement
        $query = $this->dbCon->prepare('INSERT INTO categorie(designation) VALUES (:design)');
        $query->bindValue(':design', $cat->getDesignation(), PDO::PARAM_STR); //PDO::PARAM_STR refers to a PDO Class constant which specifies an String
        $query->execute();
    }

    public function showCategorie()
    {
        $tabCateg = []; //We create an array of annee
        $request = $this->dbCon->query('SELECT * FROM categorie ORDER BY designation ASC'); //query is used to execute a request that reads the objects list from the database
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) { //while there is an entry in the table Categorie, we store it in the DB
            $tabCateg[] = new Categorie($data);
        }
        return $tabCateg;
    }


    // public function saveAffect(Affectation $affect)


    // {
    //     try {

    //         $query = $this->dbCon->prepare('INSERT INTO `affectations` ( `dateAffectation`, `idEquipementfk`, 
    //     `idServicefk`, `dureeAmort`, `etat`, `descriptions`, `anneefk`) VALUES ( ?, ?, ?, ?, ?, ?, ?)');

    // $query = $this->dbCon->prepare('INSERT INTO affectations(idAffectation,dateAffectation,idEquipementfk,idServicefk,
    // dureeAmort,etat,descriptions,anneefk)  VALUES (:idAffect, :dateAffect, :idEquip, :idServicefk, :dureeAmort, 
    //  :etat, :descript,:anneefk)');
    // $query->bindValue(':idAffect', $affect->getIdAffectation(), PDO::PARAM_INT);
    // $query->bindValue(':dateAffect', $affect->getDateAffectation());
    // $query->bindValue(':idEquip', $affect->getIdEquipementfk(), PDO::PARAM_INT);
    // $query->bindValue(':idServicefk', $affect->getIdServicefk(), PDO::PARAM_INT);
    // $query->bindValue(':dureeAmort', $affect->getDureeAmort());
    // $query->bindValue(':anneefk', $affect->getAnneefk(), PDO::PARAM_INT);
    // $query->bindValue(':etat', $affect->getEtat());
    // $query->bindValue(':descript', $affect->getDescriptions());
    // $t = $query->execute();

    //         $t = $query->execute(['2020-01-01', '1', 1, '1 mois', 'fonctionnel', 'compte', 2021]);

    //         print_r($affect);
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }

    // public function showAffectation()
    // {
    //     $tabAffect = [];
    //     $request = $this->dbCon->query('SELECT * FROM affectations  ORDER BY idAffectation ASC');
    //     while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
    //         $tabAffect[] = new Affectation($data);
    //     }
    //     return $tabAffect;
    // }


    public function saveEquip(Equipement $equip)
    {
        $query = $this->dbCon->prepare('INSERT INTO equipement (idEquipement, designation, model, marque, categoriefk, dateAcquisition, description) VALUES (:idEquip, :design, :model, :marque, :categfk, :dateAcqui, :descript)');
        $query->bindValue(':idEquip', $equip->getIdEquipement(), PDO::PARAM_INT);
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
        $equip = []; //We create an array of service
        $request = $this->dbCon->query('SELECT * FROM equipement ORDER BY idEquipement');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $equip[] = new Equipement($data);
        }
        return $equip;
    }

    public function saveMaint(Maintenance $mainte)
    {
        $query = $this->dbCon->prepare('INSERT INTO maintenance (idMaintenance, dateMaintenance, motif, description, operateur, idAffectationfk) VALUES (:idMaint, :dateMaint, :motif, :descript, :opera, :idAffectfk)');
        $query->bindParam(':idMaint', $mainte->getIdMaintenance(), PDO::PARAM_INT);
        $query->bindParam(':dateMaint', $mainte->getDateMaintenance());
        $query->bindParam(':motif', $mainte->getMotif());
        $query->bindParam(':descript', $mainte->getDescription());
        $query->bindParam(':opera', $mainte->getOperateur());
        $query->bindParam(':idAffectfk', $mainte->getIdAffectationfk(), PDO::PARAM_INT);
        $query->execute();
    }

    public function showMaintenance()
    {
        $tabMaint = []; //We create an array of maintenance
        $request = $this->dbCon->query('SELECT * FROM maintenance ORDER BY idMaintenance');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $tabMaint[] = new Maintenance($data);
        }
        return $tabMaint;
    }
    public function saveUsers(Utilisateur $user)
    {
        $query = $this->dbCon->prepare('INSERT INTO utilisateur (idUser, nom, pasword roleSys, email, fonction, telephone, etat, idServicefk) VALUES (:idUser, :nom, :pasword, :roleSys, :email, :fonction, :telephone, :etat, :idServicefk)');
        $query->bindParam(':idUser', $user->getIdUser(), PDO::PARAM_INT);
        $query->bindParam(':nom', $user->getNom());
        $query->bindParam(':pasword', $user->getPasword());
        $query->bindParam(':roleSys', $user->getRoleSys());
        $query->bindParam(':email', $user->getEmail());
        $query->bindParam(':fonction', $user->getFonction());
        $query->bindParam(':telephone', $user->getTelephone(), PDO::PARAM_INT);
        $query->bindParam(':etat', $user->getEtat());
        $query->bindParam(':idServicefk', $user->getIdServicefk(), PDO::PARAM_INT);
        $query->execute();
    }

    public function showUsers()
    {
        $user = []; //We create an array of maintenance
        $request = $this->dbCon->query('SELECT * FROM utilisateur ORDER BY idUser');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $user[] = new Utilisateur($data);
        }
        return $user;
    }
    public function deleteService($id)
    {
        $request = $this->dbCon->exec("DELETE FROM SERVICE WHERE idService=" . $id);
    }

    public function deleteAnnee($id)
    {
        $request = $this->dbCon->exec("DELETE FROM ANNEE WHERE idAnnee=" . $id);
    }
    public function deleteCategorie($id)
    {
        $request = $this->dbCon->exec("DELETE FROM CATEGORIE WHERE idCategorie=" . $id);
    }
    public function deleteAffectation($id)
    {
        $request = $this->dbCon->exec("DELETE FROM AFFECTATION WHERE idAffectation=" . $id);
    }
    public function deleteEquipement($id)
    {
        $request = $this->dbCon->exec("DELETE FROM EQUIPEMENT WHERE idEquipement=" . $id);
    }
    public function deleteMaintenance($id)
    {
        $request = $this->dbCon->exec("DELETE FROM MAINTENANCE WHERE idMaintenance=" . $id);
    }
    public function deleteUser($id)
    {
        $request = $this->dbCon->exec("DELETE FROM UTILISATEUR WHERE idUser=" . $id);
    }

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
    public function loadCat()
    {
        $request = $this->dbCon->query('SELECT designation FROM categorie ORDER BY designation ASC');
        // var_dump($request);
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $cate[] = ($data);
        }
        return $cate;
    }
}
