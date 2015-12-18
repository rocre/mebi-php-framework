<?php

class Controller_Default extends Controller
{
	private $view;
	
	public function __construct()
	{
	}
		
	public function defaultMethod($args)
	{
		$this->show($args);
	}
	
	private function buildPage()
	{
		$this->view = new View_Page('Test page');
		
		$this->view->addItem(new View_Header('Test page'));
		$this->view->addItem(new View_Paragraph('Hello world...'));
	}
	
	public function show($args)
	{
		$this->buildPage();
		$this->view->sendHeaders();
		echo $this->view->render();
	}
}