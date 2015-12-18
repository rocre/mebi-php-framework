<?php

class View_Element
{
	private $id;
	private $class;
	
	public function __construct($id, $class)
	{
		$this->setId($id);
		$this->setClass($class);
	}
	
	private function setId($newId)
	{
		$this->id = (string) $newId;
	}
	
	private function setClass($newClass)
	{
		$this->class = (string) $newClass;
	}

	private function getIdString()
	{
		if($this->id == 'null')
			return '';
		else
			return ' id="' . $this->getId() . '"';
	}
	
	private function getClassString()
	{
		if($this->class == 'null')
			return '';
		else
			return ' class="' . $this->getClass() . '"';
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getClass()
	{
		return $this->class;
	}
	
	public function __toString()
	{
		return $this->getIdString() . $this->getClassString();
	}
}
