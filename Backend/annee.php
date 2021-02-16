<?php

class Annee
{
	private $annee;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	public function setAnnee($annee)
	{
		$annee = (int)$annee;
		if (is_int($annee) && $annee > 0) {
			$this->annee = $annee;
		}
	}

	public function getAnnee()
	{
		return $this->annee;
	}
}
