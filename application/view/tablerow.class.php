<?php

class View_TableRow extends View_Element
{
	private $value;
	private $items;
	
	public function __construct($class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->elements = array();
	}
	
	public function addItem(View_TableItem $item)
	{
		$this->items[] = $item;
	}
	
	public function render()
	{
		$rendered = '<tr' . parent::__toString() . '>';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</tr>';
		return $rendered;
	}
}
