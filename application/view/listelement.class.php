<?php

class View_ListElement extends View_Element implements View_Item
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
		if(is_a($this->value, 'View_Element'))
			return $this->value->render();
		else
			return $this->value;
	}
	
	public function render()
	{
		$rendered = '<li' . parent::__toString() . '>';
		$rendered .= $this->getValue();
		$rendered .= '</li>';
		return $rendered;
	}
}
