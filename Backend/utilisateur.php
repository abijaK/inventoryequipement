
<?php

class Utilisateur
{
	private $idUser;
	private $nom;
	private $pasword;
	private $roleSys;
	private $email;
	private $fonction;
	private $telephone;
	private $etat;
	private $idServicefk;

	public function __construct(array $data)
	{
		// iterate into array and set method for each attribute
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			//check if the set method exists in the object

			if (method_exists($this, $method)) {
				// Call Setter corresponding attribute and addign the value from array
				$this->$method($value);
			}
		}
	}

	public function setIdUser($idUser)
	{
		$idUser = (int) $idUser;
		if (is_int($idUser) && $idUser > 0) {

			$this->idUser = $idUser;
		}
	}

	public function getIdUser()
	{
		return $this->idUser;
	}

	public function setNom($nom)
	{
		$nom = (string)$nom;
		if (is_string($nom)) {

			$this->nom = $nom;
		}
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function setPasword($pasword)
	{
		$pasword = (string)$pasword;
		if (is_string($pasword)) {

			$this->pasword = $pasword;
		}
	}

	public function getPasword()
	{
		return $this->pasword;
	}

	public function setRoleSys($roleSys)
	{
		$roleSys = (string)$roleSys;
		if (is_string($roleSys)) {

			$this->roleSys = $roleSys;
		}
	}

	public function getRoleSys()
	{
		return $this->roleSys;
	}

	public function setEmail($email)
	{
		$email = (string)$email;
		if (is_string($email)) {

			$this->email = $email;
		}
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setFonction($fonction)
	{
		$fonction = (string)$fonction;
		if (is_string($fonction)) {

			$this->fonction = $fonction;
		}
	}

	public function getFonction()
	{
		return $this->fonction;
	}

	public function setTelephone($telephone)
	{
		$telephone = (int)$telephone;
		if (is_int($telephone)) {

			$this->telephone = $telephone;
		}
	}

	public function getTelephone()
	{
		return $this->telephone;
	}

	public function setEtat($etat)
	{
		$etat = (string)$etat;
		if (is_string($etat)) {

			$this->etat = $etat;
		}
	}

	public function getEtat()
	{
		return $this->etat;
	}

	public function setIdServicefk($idServicefk)
	{
		$idServicefk = (int)$idServicefk;
		if (is_int($idServicefk) && $idServicefk > 0) {

			$this->idServicefk = $idServicefk;
		}
	}

	public function getIdServicefk()
	{
		return $this->idServicefk;
	}
}
?>