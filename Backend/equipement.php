<?php
class Equipement
{
    private $idEquipement;
    private $designation;
    private $model;
    private $marque;
    private $categoriefk;
    private $dateAcquisition;
    private $description;

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

    public function setIdEquipement($idEquipement)
    {
        $idEquipement = (int) $idEquipement;
        if (is_int($idEquipement) && $idEquipement > 0) {

            $this->idEquipement = $idEquipement;
        }
    }

    public function getIdEquipement()
    {
        return $this->idEquipement;
    }

    public function setDesignation($designation)
    {
        $designation = (string)$designation;
        if (is_string($designation)) {

            $this->designation = $designation;
        }
    }

    public function getDesignation()
    {
        return $this->designation;
    }


    public function setModel($model)
    {
        $model = (string) $model;
        if (is_string($model)) {

            $this->model = $model;
        }
    }

    public function getModel()
    {
        return $this->model;
    }


    public function setMarque($marque)
    {
        $marque = (string) $marque;
        if (is_string($marque)) {

            $this->marque = $marque;
        }
    }

    public function getMarque()
    {
        return $this->marque;
    }


    public function setCategoriefk($categoriefk)
    {
        $this->categoriefk = $categoriefk;
    }

    public function getCategoriefk()
    {
        return $this->categoriefk;
    }


    public function setDateAcquisition($dateAcquisition)
    {
        $this->dateAcquisition = $dateAcquisition;
    }

    public function getDateAcquisition()
    {
        return $this->dateAcquisition;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function add($idEquipement, $designation, $model, $marque, $categoriefk, $dateAcquisition, $description)
    {
    }

    public function delete()
    {
    }

    public function display()
    {

        return 'Liste des Equipements:' . '<br>' . '<br>';
        return $this->idEquipement . '<br>';
        return $this->designation . '<br>';
        return $this->model . '<br>';
        return $this->marque . '<br>';
        /* return $this->categoriefk;*/
        return $this->dateAcquisition . '<br>';
        return $this->description . '<br>';
    }

    public function update()
    {
    }
}
