<?php

class View_Form extends View_Element implements View_Item
{
	const POST = 'post';
	const GET = 'get';
	
	private $action;
	private $method;
	private $items;
	
	public function __construct($action = '', $method = View_Form::POST, $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setAction($action);
		$this->setMethod($method);
		$this->elements = array();
	}
	
	public function addItem(View_Item $item)
	{
		$this->items[] = $item;
	}
	
	private function setAction($newAction)
	{
		if($newAction == '') {
			$this->action = $_SERVER['PHP_SELF'];
		}
		else {
			$this->action = $newAction;
		}
	}
	
	private function setMethod($newMethod)
	{
		switch ($newMethod) {
    		case View_Form::POST:
    		case View_Form::GET: $this->method = $newMethod; break;
    		default: $this->method = View_Form::POST;
    	}
	}
	
	public function getAction()
	{
		return $this->action;
	}
	
	public function getMethod()
	{
		return $this->method;
	}
	
	public function render()
	{
		$rendered = '<form' . parent::__toString();
		$rendered .= ' action="' . $this->getAction() . '"';
		$rendered .= ' method="' . $this->getMethod() . '">';
		foreach($this->items as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</form>';
		return $rendered;
	}
}
