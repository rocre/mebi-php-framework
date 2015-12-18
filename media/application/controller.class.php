<?php

abstract class Controller
{
	public function callMethod($methodName, $args)
	{
		if(method_exists($this, $methodName)) {
			$this->$methodName($args);
		}
		else {
			$this->defaultMethod($args);
		}
	}
	
	abstract public function defaultMethod($args);
}