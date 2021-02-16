<?php
class Categorie
{
	private $designation;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
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
}
