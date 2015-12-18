<?php

class Model_Temperature
{
	private $kelvin;
	
	public function __construct()
	{
		$this->setKelvin('0.0');
	}
	
	private function convertFromString($newValue)
	{
	   if(is_string($newValue))
	   {
		   return (double) doubleval($newValue);
	   }
	   return (double) 0;
	}
	
	public function setCelsius($newValue)
	{			
		$this->kelvin = $this->convertFromString($newValue) + 273.15;
	}
	
	public function setFahrenheit($newValue)
	{
		$this->kelvin = ($this->convertFromString($newValue) + 459.67) * 5.0 / 9.0;
	}
	
	public function setKelvin($newValue)
	{
		$this->kelvin = $this->convertFromString($newValue);
	}	
	
	public function getCelsius()
	{
		return round(($this->kelvin - 273.15), 2);
	}
	
	public function getFahrenheit()
	{
		return round((($this->kelvin * 9.0 / 5.0) - 459.67), 2);
	}
	
	public function getKelvin()
	{
		return round($this->kelvin, 2);
	}
	
}