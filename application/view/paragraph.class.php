<?php

class View_Paragraph extends View_Element implements View_Item
{	
	private $value;
	
	public function __construct($value, $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->value = $value;
	}
	
	public function render()
	{
		$rendered = '<p' . parent::__toString() . '>';
		$rendered .= $this->value;
		return $rendered;
	}
}
