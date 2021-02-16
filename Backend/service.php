<?php
class Service
{
	private $idService;
	private $designation;

	public function __construct(array $data)
	{
		// iterate into array and set method for each attribute
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			//check if the set method exists in the object

			if (method_exists($this, $method)) {
				// Call Setter corresponding attribute and assign the value from array
				$this->$method($value); //It is the same transcription with $this->set$key($value); Here $key is the attribute of the object
			}
		}
	} //serviceHydrator is changed into a constructor to facilitate hydratation while an object is being created

	public function setIdService($idService)
	{
		$idService = (int) $idService;
		if (is_int($idService) && $idService > 0) {

			$this->idService = $idService;
		}
	}

	public function getIdService()
	{
		return $this->idService;
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
