<?php

class View_Button extends View_Element implements View_Item
{
	const SUBMIT = 'submit';
	const RESET = 'reset';
	const BUTTON = 'button';
	
	private $type;
	private $name;
	private $value;
	
	public function __construct($type = View_Button::BUTTON, $name = '', $value = '', $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setType($type);
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
	
	private function setType($newType)
	{
		switch ($newType) {
    		case View_Button::SUBMIT:
    		case View_Button::RESET:
    		case View_Button::BUTTON: $this->type = $newType; break;
    		default: $this->type = View_Button::BUTTON;
    	}
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function render()
	{
		$rendered = '<input' . parent::__toString();
		$rendered .= ' type="' . $this->getType() . '"';
		if($this->getName() != '') {
			$rendered .= ' name="' . $this->getName() . '"';
		}
		if($this->getValue() != '') {
			$rendered .= ' value="' . $this->getValue() . '"';
		}
		$rendered .= '>';
		return $rendered;
	}
}
