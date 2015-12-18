<?php

class View_Textfield extends View_Element implements View_Item
{
	private $name;
	private $value;
	
	public function __construct($name, $value = '', $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setName($name);
		$this->setValue($value);
	}
	
	private function setValue($newValue)
	{
		$this->value = $newValue;
	}
	
	private function setName($newName)
	{
		$this->name = $newName;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function render()
	{
		$rendered = '<input type="text"' . parent::__toString();
		$rendered .= ' name="' . $this->getName() . '"';
		$rendered .= ' value="' . $this->getValue() . '">';
		return $rendered;
	}
}
