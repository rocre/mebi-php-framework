<?php

class WebRouter
{
	private $controllerName;
	private $method;
	private $args;
	
	public function __construct($routerString)
	{
		$this->splitPath($routerString);
	}
	
	private function splitPath($routerString)
	{
		//Opdelen van path in 3 of minder delen
		$parts = explode('/', $routerString, 3);
		
		//Eerste deel is de naam van de controller in de applicatie
		$this->controllerName = 'Controller_' . $parts[0];
		
		//Bepalen van de method, bij lege method wordt 'default' gebruikt
		$this->method = (isset($parts[1])) ? $parts[1] : 'defaultMethod';
		
		//Bepalen van de argumenten, via een array
		$this->args = (isset($parts[2])) ? explode('/', $parts[2]) : array();
	}
	
	public function getControllerName()
	{
		return $this->controllerName;
	}
	
	public function getMethod()
	{
		return $this->method;
	}
	
	public function getArgs()
	{
		return $this->args;
	}
}