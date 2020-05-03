<?php

class Contact{
	private $id;
	private $name;
	private $telephone;

	public function __construct($name, $telephone)
	{
		$this->name = $name;
		$this->telephone = $telephone;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getTelephone()
	{
		return $this->telephone;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setTelephone($telephone)
	{
		$this->telephone = $telephone;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

}

?>