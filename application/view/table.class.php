<?php

class View_Table extends View_Element implements View_Item
{
	private $value;
	private $caption;
	private $bodyItems;
	private $headerItems;
	private $footerItems;
	
	public function __construct($caption = 'null', $class = 'null', $id = 'null')
	{
		parent::__construct($id, $class);
		$this->setCaption($caption);
		$this->bodyItems = array();
		$this->headerItems = array();
		$this->footerItems = array();
	}
	
	private function setCaption($newCaption)
	{
		$this->caption = (string) $newCaption;
	}
	
	public function getCaption()
	{
			return $this->caption;
	}
	
	private function getCaptionString()
	{
		if($this->getCaption() == 'null')
			return '';
		else
			return '<caption>' . $this->getCaption() . '</caption>';
	}
	
	public function addItem(View_TableRow $item)
	{
		$this->bodyItems[] = $item;
	}
	
	public function addHeaderItem(View_TableRow $item)
	{
		$this->headerItems[] = $item;
	}
	
	public function addFooterItem(View_TableRow $item)
	{
		$this->footerItems[] = $item;
	}
	
	public function render()
	{
		$rendered = '<table' . parent::__toString() . '>';
		$rendered .= $this->getCaptionString();
		if(isset($this->headerItems[0])) {
			$rendered .= '<thead>';
			foreach($this->headerItems as $item) {
				$rendered .= $item->render();
			}
			$rendered .= '</thead>';
		}
		$rendered .= '<tbody>';
		foreach($this->bodyItems as $item) {
			$rendered .= $item->render();
		}
		$rendered .= '</tbody>';
		if(isset($this->footerItems[0])) {
			$rendered .= '<tfoot>';
			foreach($this->footerItems as $item) {
				$rendered .= $item->render();
			}
			$rendered .= '</tfoot>';
		}
		$rendered .= '</table>';
		return $rendered;
	}
}
