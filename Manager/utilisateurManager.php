<?php
class UtilisateurManager
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


    public function saveUsers(Utilisateur $user)
    {
        $query = $this->dbConx->prepare('INSERT INTO utilisateur (/* idUser, */ nom, pasword ,roleSys, email, fonction, telephone, etat, idServicefk) VALUES (/* :idUser,  */:nom, :pasword, :roleSys, :email, :fonction, :telephone, :etat, :idServicefk)');
        // $query->bindValue(':idUser', $user->getIdUser(), PDO::PARAM_INT);
        $query->bindValue(':nom', $user->getNom());
        $query->bindValue(':pasword', $user->getPasword());
        $query->bindValue(':roleSys', $user->getRoleSys());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':fonction', $user->getFonction());
        $query->bindValue(':telephone', $user->getTelephone(), PDO::PARAM_INT);
        $query->bindValue(':etat', $user->getEtat());
        $query->bindValue(':idServicefk', $user->getIdServicefk(), PDO::PARAM_INT);
        print_r($query->execute());
    }

    public function showUsers()
    {
        $tabUser = []; //We create an array of maintenance
        $request = $this->dbConx->query('SELECT * FROM utilisateur ORDER BY idUser');
        while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {
            $tabUser[] = new Utilisateur($data);
        }
        return $tabUser;
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
