<?php

class View_Header extends View_Element implements View_Item
{
	private $value;
	private $level;
	
	public function __construct($value, $level = '1', $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setValue($value);
		$this->setLevel($level);
	}
	
	private function setValue($newValue)
	{
		$this->value = $newValue;
	}
	
	private function setLevel($newLevel)
	{
		$this->level = $newLevel;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function getLevel()
	{
		return $this->level;
	}
	
	public function render()
	{
		$rendered = '<h' . $this->getLevel() . parent::__toString() . '>';
		$rendered .= $this->getValue();
		$rendered .= '</h' . $this->getLevel() . '>';
		return $rendered;
	}
}
