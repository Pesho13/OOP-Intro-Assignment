<?php

class GSM
{
	private $model;
	
	private $hasSimCard;
	
	private $simMobileNumber;
	
	private $outgoingCallsDuration;
	
	private $lastIncomingCall;
	
	private $lastOutgoingCall;
	
	private $call;
	
	public function __construct($model)
	{
		$this->model = $model;
	}
	
	public function insertSimCard($simMobileNumber)
	{
		if(preg_match('@(^08[7-9][0-9](\s*|/)([0-9](\s*|\-*)){6}$)@', $simMobileNumber)) {
			$this->hasSimCard = true;
			$this->simMobileNumber = $simMobileNumber;
		}
	}
	
	public function removeSimCard()
	{
		$this->hasSimCard = false;
		$this->simMobileNumber = '';
	}
	
	public function getHasSimCard()
	{
		return $this->hasSimCard;
	}
	
	public function getMobileNumber()
	{
		return $this->simMobileNumber;
	}
	
	public function call($receiver, $duration)
	{
		if(!$receiver->hasSimCard || !$this->hasSimCard){
			return 'Can not make a call!';
		}
		
		if($receiver->getMobileNumber() == $this->simMobileNumber){
			return 'Can not make a call!';
		}
		
		if($duration < 0 || $duration > 120){
			return 'Can not make a call!';
		}
		
		$this->call = new Call($this->simMobileNumber, $receiver->getMobileNumber(), $duration);
		
		$this->outgoingCallsDuration += $duration;
		$this->lastOutgoingCall = $receiver->simMobileNumber;
		$receiver->lastIncomingCall = $this->simMobileNumber;
	}
	
	public function getSumForCall()
	{
		$call = $this->call;
		return $this->outgoingCallsDuration * $call::$priceForAMinute . '$';
	}
	
	
	public function printInfoForTheLastOutgoingCall()
	{
		if(!$this->lastOutgoingCall){
			return 'There are no outgoing calls!';
		}
		
		return sprintf('Last outgoing call is to number %s. Duration of the call - %d minutes. Cost for all calls - %.2f$',
				$this->lastOutgoingCall, $this->call->getDuration(), $this->getSumForCall());
	}
	
	public function printInfoForTheLastIncomingCall()
	{
		if(!$this->lastIncomingCall){
			return 'There are no incoming calls!';
		}
		
		return sprintf('The last incoming call was from number %s.', $this->lastIncomingCall);
	}
}











