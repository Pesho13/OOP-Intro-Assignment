<?php

class Call
{
	public static $priceForAMinute = 0.19;
	
	private $caller;
	
	private $reciever;
	
	private $duration;
	
	public function __construct($caller, $receiver, $duration)
	{

		if($duration < 0 && $duration > 120){
			return;
		}
		
		$this->caller = $caller;
		$this->reciever = $receiver;
		$this->duration = $duration;
	}
	

	public function getCaller()
	{
		return $this->caller;
	}
	
	public function getReciever()
	{
		return $this->reciever;
	}
	
	public function getDuration()
	{
		return $this->duration;
	}
	
}