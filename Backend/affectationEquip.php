<?php
class AffectationEquip
{
    private $idAffEqu,
        $dateAffEqu,
        $idEqufk,
        $idServifk,
        $amortDuree,
        $anneeAfk,
        $eta,
        $descr;
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function setIdAffEqu($idAffEqu)
    {
        $idAffEqu = (int) $idAffEqu;
        if (is_int($idAffEqu) && $idAffEqu > 0) {
            $this->idAffEqu = $idAffEqu;
        }
    }
    public function getIdAffEqu()
    {
        return $this->idAffEqu;
    }
    public function setDateAffEqu($dateAffEqu)
    {
        $dateAffEqu = (string) $dateAffEqu;
        if (is_string($dateAffEqu)) {
            $this->dateAffEqu = $dateAffEqu;
        }
    }
    public function getDateAffEqu()
    {
        return $this->dateAffEqu;
    }
    public function setIdEqufk($idEqufk)
    {
        $idEqufk = (int) $idEqufk;
        if (is_int($idEqufk) && $idEqufk > 0) {
            $this->idAffEqu = $idEqufk;
        }
    }
    public function getIdEqufk()
    {
        return $this->idEqufk;
    }
    public function setIdServifk($idServifk)
    {
        $idServifk = (int) $idServifk;
        if (is_int($idServifk) && $idServifk > 0) {
            $this->idServifk = $idServifk;
        }
    }
    public function getIdServifk()
    {
        return $this->idServifk;
    }
    public function setAmortDuree($amortDuree)
    {
        $amortDuree = (int) $amortDuree;
        if (is_string($amortDuree)) {
            $this->amortDuree = $amortDuree;
        }
    }
    public function getAmortDuree()
    {
        return $this->amortDuree;
    }
    public function setAnneeAfk($anneeAfk)
    {
        $anneeAfk = (int) $anneeAfk;
        if (is_int($anneeAfk) && $anneeAfk > 0) {
            $this->anneeAfk = $anneeAfk;
        }
    }
    public function getAnneeAfk()
    {
        return $this->anneeAfk;
    }
    public function setEta($eta)
    {
        $eta = (int) $eta;
        if (is_string($eta)) {
            $this->eta = $eta;
        }
    }
    public function getEta()
    {
        return $this->eta;
    }
    public function setDescr($descr)
    {
        $descr = (int) $descr;
        if (is_string($descr)) {
            $this->descr = $descr;
        }
    }
    public function getDescr()
    {
        return $this->descr;
    }
}
