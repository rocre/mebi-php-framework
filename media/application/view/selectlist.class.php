<?php

class View_Selectlist extends View_Element implements View_Item
{
	private $name;
	private $size;
	private $multiple;
	private $items;
	
	public function __construct($name, $multiple = false, $size = 1, $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setName($name);
		$this->setMultiple($multiple);
		$this->setSize($size);
	}
	
	private function setSize($newSize)
	{
		if(is_int($newSize) && $newSize >= 1)
			$this->size = $newSize;
		else
			$this->size = 1;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	private function setMultiple($newMultiple)
	{
		if(is_bool($newMultiple) && $newMultiple)
			$this->multiple = true;
		else
			$this->multiple = false;
	}
	
	private function setName($newName)
	{
		$this->name = $newName;
	}
	
	public function addOption(View_SelectlistItem $item)
	{
		$this->items[] = $item;
	}
	
	public function getMultiple()
	{
		return $this->multiple;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function render()
	{
		$rendered = '<select' . parent::__toString();
		$rendered .= ' name="' . $this->getName() . '"';
		$rendered .= ' size="' . $this->getSize() . '"';
		if($this->getMultiple())
			$rendered .= ' multiple';
		$rendered .= '>';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</select>';
		return $rendered;
	}
}
