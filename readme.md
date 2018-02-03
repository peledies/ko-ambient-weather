# ambient-weather

This module is built for interacting with the [ambientweather.net](http://ambientweather.net) API. It utilizes the [ko\json-cache](https://github.com/peledies/ko-json-cache) module to reduce pressure on the ambient weather API and to provide a faster load time for the weather station data.

| Property | Type | Description |
| -------- | ---- | ----------- |
| apiKey | String | Number of minutes the cache will be used before being declared invalid [ Default 15 ]|
| apiKey | String | Number of minutes the cache will be used before being declared invalid [ Default 15 ]|
| interval | Integer | The directory of the json cache file [ Default json-cache.json ]
| timeframe | Integer | The directory of the json cache file [ Default json-cache.json ]
| device | String | The directory of the json cache file [ Default json-cache.json ]


## Usage

#### Build the cache
Build the `cache` settings object
```php
  $KOCacheSettings = new \KO\Cache\Settings();
  $KOCacheSettings->setValidity(15);
  $KOCacheSettings->setFile('data_cache.json');
```

Instantiate a new cache object with the settings
```php
  $KOCache = new \KO\Cache\Cache($KOCacheSettings);
```

#### Build the AmbientWeather object
Build the `AmbientWeather` settings object
```php
  $AWSettings = new \KO\AmbientWeather\Settings();
  $AWSettings->setApiKey('your-api-key-here');
  $AWSettings->setApplicationKey('your-application-key-here');
  $AWSettings->setInterval(5);
  $AWSettings->setTimeframe(4);
  $AWSettings->setDevice('device-mac-address');
```

Instantiate a new `AmbientWeather` object with the settings
```php
  $AW = new \KO\AmbientWeather\AmbientWeather($AWSettings, $KOCache);
```

## Charts
```
new KO\AmbientWeather\Charts\Wind();
new KO\AmbientWeather\Charts\Temperature();
new KO\AmbientWeather\Charts\Barometric();
```

## Gauges
```
KO\AmbientWeather\Gauges\WindDirection();
KO\AmbientWeather\Gauges\WindSpeed();
```

## Documentation

See the full [Documentation](http://ko.karnsonline.com/ambient-weather) for more details.