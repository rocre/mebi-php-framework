<?php

class View_SelectlistItem
{
	private $label;
	private $value;
	private $selected;
	
	public function __construct($label, $value = '', $selected = false)
	{
		$this->setLabel($label);
		$this->setValue($value);
		$this->setSelected($selected);
	}
	
	private function setLabel($newLabel)
	{
		$this->label = $newLabel;
	}
	
	public function getLabel()
	{
		return $this->label;
	}
	
	private function setValue($newValue)
	{
		$this->value = $newValue;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	private function setSelected($newSelected)
	{
		if(is_bool($newSelected) && $newSelected)
			$this->selected = true;
		else
			$this->selected = false;
	}
	
	public function getSelected()
	{
		return $this->selected;
	}
	
	public function render()
	{
		$rendered = '<option';
		if($this->getSelected())
			$rendered .= ' selected';
		if($this->getValue() != '')
			$rendered .= ' value="' . $this->getValue() . '"';
		$rendered .= '>';
		$rendered .= $this->getLabel();
		$rendered .= '</option>';
		return $rendered;
	}
}
