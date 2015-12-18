<?php

class View_List extends View_Element implements View_Item
{
	private $value;
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
		$rendered = '<ul' . parent::__toString() . '>';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</ul>';
		return $rendered;
	}
}
