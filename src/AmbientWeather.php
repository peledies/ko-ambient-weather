<?php
namespace KO\AmbientWeather;

use KO\Cache\Cache;
class AmbientWeather
{
  	private $data = null;

  	private $cache = null;

  	private $apiUrl = "https://api.ambientweather.net/v1/devices/";

  	private $limit = 288;

	function __construct(Settings $settings, Cache $cache = null)
	{
		$this->settings = $settings;

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

	private function fetch(){
		$url = $this->apiUrl.$this->settings->getDevice()."?apiKey=".$this->settings->getApikey()."&applicationKey=".$this->settings->getApplicationKey()."&endDate=".$this->settings->getEndDate()."&limit=".$this->limit;
		$json = file_get_contents($url);
		return json_decode($json);
	}

	public function getData(){
		return $this->data;
	}

	public function currentConditions(){
		return $this->data[count($this->data) - 1];
	}
}
