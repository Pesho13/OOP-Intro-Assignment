<?php

namespace Computer;

class Computer
{
	private $year;
	
	private $price;
	
	private $isNotebook;
	
	private $hardDiskMemory;
	
	private $freeMemory;
	
	private $operationSystem;
	
	public function __construct($year, $price, $isNotebook, $hardDiskMemory, $freeMemory, $operationSystem)
	{
		$this->year = $year;
		$this->price = $price;
		
		if($isNotebook == 'yes' || $isNotebook == 'YES'){
			$this->isNotebook = true;
		} else {
			$this->isNotebook = false;
		}
		
		$this->hardDiskMemory = $hardDiskMemory;
		$this->freeMemory = $freeMemory;
		$this->operationSystem = $operationSystem;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getIsNotebook()
	{
		if($this->isNotebook){
			return 'It is a notebook!';
		} else {
			return 'It is not a notebook!';
		}
	}
	
	public function getFreeMemory()
	{
		return $this->freeMemory;
	}
	
	public function getHardDiskMemory()
	{
		return $this->hardDiskMemory;
	}

	public function getOperationSystem()
	{
		return $this->operationSystem;
	}
	
	public function getInfo()
	{
		return sprintf('%s Produced in %d. With hard disk memory of %d gb, actual free memory of %d gb and %s operation system. Price - %d $',
				$this->getIsNotebook(), $this->year, $this->hardDiskMemory, $this->freeMemory, $this->operationSystem, $this->price);
	}
	
	public function changeOperationSystem($newOperationSystem)
	{
		$this->operationSystem = $newOperationSystem;
	}
	
	public function useMemory($memory)
	{
		if($this->freeMemory < $memory){
			return "Not enough free memory!";
		}
			$this->freeMemory -= $memory;
	}
}