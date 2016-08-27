<?php

class Employee
{
	private $name;
	
	private $currentTask;
	
	private $hoursLeft = 8;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function setName($name)
	{
		if(!is_string($name) || !$name)
		{
			return;
		}
		
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setCurrentTask(Task $currentTask)
	{
		$this->currentTask = $currentTask;
	}
	
	public function getCurrentTask()
	{
		return $this->currentTask;
	}
	
	public function setHoursLeft($hoursLeft)
	{
		if(!is_numeric($hoursLeft) || $hoursLeft < 0){
			return;
		}
		
		$this->hoursLeft = $hoursLeft;
	}
	
	public function getHoursLeft()
	{
		return $this->hoursLeft;
	}
	
	public function work()
	{
		if(!$this->currentTask){
			return;
		}
		if($this->hoursLeft >= $this->currentTask->getWorkingHours()){
			$this->hoursLeft -= $this->currentTask->getWorkingHours();
			$left = 0;
			$this->currentTask->setWorkingHours($left);
		} else {
			$left = $this->currentTask->getWorkingHours() - $this->hoursLeft;
			$this->currentTask->setWorkingHours($left);
			$this->hoursLeft = 0;
		}
	}
	
	public function showReport()
	{	
		if(!$this->name || !$this->currentTask){
			return;
		}
		
		return sprintf('%s with task - %s. Left work hours - %d, hours until job is finished - %d.',
				$this->name, $this->currentTask->getName(), $this->hoursLeft, $this->currentTask->getWorkingHours());
	}

}











