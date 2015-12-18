<?php

class View_Block extends View_Element implements View_Item
{
	private $items;
	
	public function __construct($class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->elements = array();
	}
	
	public function addItem(View_Item $item)
	{
		$this->items[] = $item;
	}
	
	public function render()
	{
		$rendered = '<div' . parent::__toString() . '>';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</div>';
		return $rendered;
	}
}
