<?php

class View_Text extends View_Element implements View_Item
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
		$rendered = '<span' . parent::__toString() . '>';
		$rendered .= $this->getValue();
		$rendered .= '</span>';
		return $rendered;
	}
}
