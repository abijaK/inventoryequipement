<?php

class Maintenance
{
	private $idMaintenance;
	private $dateMaintenance;
	private $motif;
	private $description;
	private $operateur;
	private $idAffectationfk;

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

	public function setIdMaintenance($idMaintenance)
	{
		$idMaintenance = (int)$idMaintenance;
		if (is_int($idMaintenance) && $idMaintenance > 0) {

			$this->idMaintenance = $idMaintenance;
		}
	}

	public function getIdMaintenance()
	{
		return $this->idMaintenance;
	}

	public function setDateMaintenance($dateMaintenance)
	{
		$dateMaintenance = (string)$dateMaintenance;
		if (is_string($dateMaintenance)) {

			$this->dateMaintenance = $dateMaintenance;
		}
	}

	public function getDateMaintenance()
	{
		return $this->dateMaintenance;
	}

	public function setMotif($motif)
	{
		$motif = (string)$motif;
		if (is_string($motif)) {

			$this->motif = $motif;
		}
	}

	public function getMotif()
	{
		return $this->motif;
	}

	public function setDescription($description)
	{
		$description = (string) $description;
		if (is_string($description)) {

			$this->description = $description;
		}
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setOperateur($operateur)
	{
		$operateur = (string) $operateur;
		if (is_string($operateur)) {

			$this->operateur = $operateur;
		}
	}

	public function getOperateur()
	{
		return $this->operateur;
	}

	public function setIdAffectationfk($idAffectationfk)
	{
		$idAffectationfk = (int)$idAffectationfk;
		if (is_int($idAffectationfk) && $idAffectationfk > 0) {

			$this->idAffectationfk = $idAffectationfk;
		}
	}

	public function getIdAffectationfk()
	{
		return $this->idAffectationfk;
	}
}
