<?php
namespace KO\AmbientWeather;

interface SettingsInterface
{
	public function setApiKey($key);
	public function setApplicationKey($key);
	public function setInterval($interval);
	public function setTimeframe($hours);
	public function setEndDate($timestamp);
	public function setDevice($devices);

	public function getApiKey();
	public function getApplicationKey();
	public function getInterval();
	public function getTimeframe();
	public function getEndDate();
	public function getDevice();
}