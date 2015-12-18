<?php

class Controller_Default extends Controller
{
	private $model;
	private $view;
	
	public function __construct()
	{
		$this->model = new Model_Temperature();
		$this->model->setCelsius("25.6"); //default value for model
	}
		
	public function defaultMethod($args)
	{
		$this->show($args);
	}
	
	public function convert($args)
	{
		if(isset($_POST['format']) && isset($_POST['value'])) {
			switch($_POST['format']) {
				case 'c': $this->model->setCelsius((string) $_POST['value']); break;
				case 'f': $this->model->setFahrenheit((string) $_POST['value']); break;
				case 'k': $this->model->setKelvin((string) $_POST['value']); break;
			}
		}
		$this->show(array());
	}
	
	private function buildPage()
	{
		//Create the page as view and define action-url
		$action = $_SERVER['PHP_SELF'] . '?r=default/convert';
		$this->view = new View_Page('Temperature Conversion');
		
		//Create div-block with input form
		$block = new View_Block();
		$form = new View_Form($action);
		$form->addItem(new View_Label('Degrees '));
		$form->addItem(new View_Textfield('value'));
		$selectlist = new View_Selectlist('format');
		$selectlist->addOption(new View_SelectlistItem('Celsius', 'c'));
		$selectlist->addOption(new View_SelectlistItem('Fahrenheit', 'f'));
		$selectlist->addOption(new View_SelectlistItem('Kelvin', 'k'));
		$form->addItem($selectlist);
		$form->addItem(new View_Button(View_Button::SUBMIT));
		$block->addItem($form);
		$this->view->addItem($block);
		
		//Create div-block for displaying results
		$block = new View_Block();
		$block->addItem(new View_Paragraph('Degrees Celsius: ' . $this->model->getCelsius() . '&deg;C'));
		$block->addItem(new View_Paragraph('Degrees Fahrenheit: ' . $this->model->getFahrenheit() . '&deg;F'));
		$block->addItem(new View_Paragraph('Degrees Kelvin: ' . $this->model->getKelvin() . '&deg;K'));
		$this->view->addItem($block);
	}
	
	public function show($args)
	{
		$this->buildPage();
		$this->view->sendHeaders();
		echo $this->view->render();
	}
}