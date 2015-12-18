<?php

class View_Page extends View_Element
{
	private $title;
	private $items;
	
	public function __construct($title, $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setTitle($title);
		$this->items = array();
	}
	
	private function setTitle($newTitle)
	{
		$this->title = $newTitle;
	}
	
	public function addItem(View_Item $item)
	{
		$this->items[] = $item;
	}
	
	public function sendHeaders()
	{
		header('Content-Type: text/html');
	}
	
	public function render()
	{
		$rendered = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" ';
		$rendered .= '"http://www.w3.org/TR/html4/strict.dtd">';
		$rendered .= '<html><head>';
		$rendered .= '<title>' . $this->title . '</title>';
		$rendered .= '</head><body>';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</body></html>';
		return $rendered;
	}
}
