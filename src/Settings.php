<?php
namespace KO\AmbientWeather;

/**
* Settings class for instantiating the primary AmbientWeather class
*
* @since   0.0.1
* @author  Deac Karns <peledies@gmail.com> 
**/
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

  /**
  * Set the API key
  *
  * @param string
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setApiKey( string );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setApiKey($key){
		$this->apiKey = $key;
	}

  /**
  * Get the API key
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getApiKey();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getApiKey(){
		return $this->apiKey;
	}

  /**
  * Set the API key
  *
  * @param string
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setApplicationKey( string );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setApplicationKey($key){
		$this->applicationKey = $key;
	}

  /**
  * Get the Application key
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getApplicationKey();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getApplicationKey(){
		return $this->applicationKey;
	}

  /**
  * Set the reporting interval (minutes) for the device you wish to get data for.
  *
  * @param integer
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setInterval( integer );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setInterval($interval){
		$this->interval = $interval;
	}

  /**
  * Get the devices reporting interval.
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getInterval();
  * </code>
  *
  * @return integer
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getInterval(){
		return $this->interval;
	}

  /**
  * Set the time frame (hours) to fetch data for. 
  *
  * @param double
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setTimeframe( integer );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setTimeframe($hours){
		$this->timeframe = $hours;
	}

  /**
  * Get the specified timeframe
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getTimeframe();
  * </code>
  *
  * @return integer
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getTimeframe(){
		return $this->timeframe;
	}

  /**
  * Set the End Date for the data request
  *
  * @param string
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setEndDate( timestamp );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setEndDate($timestamp){
		$this->endDate = $timestamp;
	}

  /**
  * Get the specified end date
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getEndDate();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getEndDate(){
		return $this->endDate;
	}

  /**
  * Set the MAC address of the device you wish to receive data from
  *
  * @param string
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->setDevice( string );
  * </code>
  *
  * @return void
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function setDevice($device){
		$this->device = $device;
	}

  /**
  * Get the specified device's MAC address
  *
  * @example
  * <code>
  *   $AWSettings = new \KO\AmbientWeather\Settings();
  *   $AWSettings->getDevice();
  * </code>
  *
  * @return string
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getDevice(){
		return $this->device;
	}
}