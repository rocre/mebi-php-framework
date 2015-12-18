<?php

class View_Label extends View_Element implements View_Item
{
	private $value;
	
	public function __construct($value, $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setValue($value);
	}
	
	private function setValue($newValue)
	{
		$this->value = $newValue;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function render()
	{
		$rendered = '<label' . parent::__toString() . '>';
		$rendered .= $this->getValue();
		$rendered .= '</label>';
		return $rendered;
	}
}
