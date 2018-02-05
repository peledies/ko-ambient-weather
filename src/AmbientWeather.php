<?php
namespace KO\AmbientWeather;

use KO\Cache\Cache;

/**
* The AmbientWeather Class provides all the necessary methods needed to render chart and gauge canvas widgets.
*
* @example
* <code>
* Useage Example
* </code>
*
* @return Return
*
* @since   0.0.1
* @author  Deac Karns <peledies@gmail.com> 
**/
class AmbientWeather
{
    /**
     * Holder for data retrieved from the ambient weather API
     *
     * @var array
     **/
  	private $data = null;

    /**
     * Holder for the \KO\Cache\Cache object
     *
     * @var \KO\Cache\Cache
     **/
  	private $cache = null;

    /**
     * The ambient weather API endpoint
     *
     * @var string
     **/
  	private $apiUrl = "https://api.ambientweather.net/v1/devices/";

    /**
     * Holder for the calculated limit of data points to retrieve
     *
     * @var integer
     **/
  	private $limit = null;

  /**
   * KO\AmbientWeather\AmbientWeather class constructor
   *
   * @param \KO\AmbientWeather\Setting - A fully configured settings object
   * @param \KO\Cache\Cache - A fully configured Cache object
   * 
   * @return void
   * @since 0.0.1
   * @author Deac Karns <peledies@gmail.com> 
   **/
	function __construct(Settings $settings, Cache $cache = null)
	{
		$this->settings = $settings;

    $this->limit = $this->calculateLimit();

		if(!is_null($cache)){
			$this->cache = $cache;
			if($this->cache->isStale()){
				$this->cache->writeToCache( $this->fetch() );

				$oldSettings = $this->cache->getSettings();
				
				$settings = new \KO\Cache\Settings();
				$settings->setValidity( $oldSettings->getValidity() );
				$settings->setFile( $oldSettings->getFile() );

				$this->cache = new Cache($settings);
			}
		}

		$this->data = array_reverse($this->cache->getData());
	}

  /**
  * Calculate the number of datapoints to return based on the values of `interval` and `timeframe`
  *
  * @return integer
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
  private function calculateLimit(){
    return $this->settings->getTimeframe() * 60 / $this->settings->getInterval();
  }

  /**
  * Fetch the data from the ambient weather API
  *
  * @return Array
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	private function fetch(){
		$url = $this->apiUrl.$this->settings->getDevice()."?apiKey=".$this->settings->getApikey()."&applicationKey=".$this->settings->getApplicationKey()."&endDate=".$this->settings->getEndDate()."&limit=".$this->limit;
		$json = file_get_contents($url);
		return json_decode($json);
	}

  /**
  * Get all data for the specified time range.
  *
  * @return Array
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function getData(){
		return $this->data;
	}

  /**
  * Get the most current conditions.
  *
  * @return Object
  *
  * @since   0.0.1
  * @author  Deac Karns <peledies@gmail.com> 
  **/
	public function currentConditions(){
		return $this->data[count($this->data) - 1];
	}
}
