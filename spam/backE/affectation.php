<?php
class Affectation
{
    private $idAffectation;
    private $dateAffectation;
    private $idEquipementfk;
    private $idServicefk;
    private $dureeAmort;
    private $anneefk;
    private $etat;
    private $descriptions;

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

    public function setIdAffectation($idAffectation)
    {
        $idAffectation = (int)$idAffectation;
        if (is_int($idAffectation) && $idAffectation > 0) {

            $this->idAffectation = $idAffectation;
        }
    }

    public function getIdAffectation()
    {
        return $this->idAffectation;
    }

    public function setDateAffectation($dateAffectation)
    {
        $dateAffectation = (string)$dateAffectation;
        if (is_string($dateAffectation)) {

            $this->dateAffectation = $dateAffectation;
        }
    }

    public function getDateAffectation()
    {
        return $this->dateAffectation;
    }

    public function setIdEquipementfk($idEquipementfk)
    {
        $idEquipementfk = (int)$idEquipementfk;
        if (is_int($idEquipementfk) && $idEquipementfk > 0) {

            $this->idEquipementfk = $idEquipementfk;
        }
    }

    public function getIdEquipementfk()
    {
        return $this->idEquipementfk;
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

    public function setDureeAmort($dureeAmort)
    {
        $dureeAmort = (string)$dureeAmort;
        if (is_string($dureeAmort)) {

            $this->dureeAmort = $dureeAmort;
        }
    }

    public function getDureeAmort()
    {
        return $this->dureeAmort;
    }

    public function setAnneefk($anneefk)
    {
        $anneefk = (int)$anneefk;
        if (is_int($anneefk) && $anneefk > 0) {

            $this->anneefk = $anneefk;
        }
    }

    public function getAnneefk()
    {
        return $this->anneefk;
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

    public function setDescriptions($description)
    {
        $description = (string)$description;
        if (is_string($description)) {

            $this->descriptions = $description;
        }
    }

    public function getDescriptions()

    {
        return $this->descriptions;
    }
}
