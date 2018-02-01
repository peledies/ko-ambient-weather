<?php
namespace KO\AmbientWeather;

class Settings implements SettingsInterface
{

	// device reporting interval in minutes
  	private $interval = null;

  	// timeframe in hours to display
  	private $timeframe = null;
  	
  	private $endDate = null;

  	private $apiKey = null;

  	private $applicationKey = null;

  	private $device = null;

	public function setApiKey($key){
		$this->apiKey = $key;
	}

	public function getApiKey(){
		return $this->apiKey;
	}

	public function setApplicationKey($key){
		$this->applicationKey = $key;
	}

	public function getApplicationKey(){
		return $this->applicationKey;
	}

	public function setInterval($interval){
		$this->interval = $interval;
	}

	public function getInterval(){
		return $this->intervall;
	}

	public function setTimeframe($hours){
		$this->timeframe = $hours;
	}

	public function getTimeframe(){
		return $this->timeframe;
	}

	public function setEndDate($timestamp){
		$this->endDate = $timestamp;
	}

	public function getEndDate(){
		return $this->endDate;
	}

	public function setDevice($device){
		$this->device = $device;
	}

	public function getDevice(){
		return $this->device;
	}
}