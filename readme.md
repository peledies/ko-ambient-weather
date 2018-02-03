# ambient-weather

This module is built for interacting with the [ambientweather.net](http://ambientweather.net) API. It utilizes the [ko\json-cache](https://github.com/peledies/ko-json-cache) module to reduce pressure on the ambient weather API and to provide a faster load time for the weather station data.

## Install
```php
composer require ko/ambient-weather
```

## Properties

| Property | Type | Description |
| -------- | ---- | ----------- |
| apiKey | String | Your ambient weather API Key |
| applicationKey | String | Your ambient weather API Applicaiton Key |
| interval | Integer | The reporting interval of your weather station
| timeframe | Integer | The ammount of time into the past to fetch data for |
| device | String | The MAC address of your weather station |


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

#### Charts
```
new KO\AmbientWeather\Charts\Wind($AW);
new KO\AmbientWeather\Charts\Temperature($AW);
new KO\AmbientWeather\Charts\Barometric($AW);
```

#### Gauges
```
KO\AmbientWeather\Gauges\WindDirection($AW);
KO\AmbientWeather\Gauges\WindSpeed($AW);
```

#### Complete Example
```
<?php
  date_default_timezone_set("America/New_York");

  require("vendor/autoload.php");
  
  $KOCacheSettings = new \KO\Cache\Settings();
  $KOCacheSettings->setValidity(15);
  $KOCacheSettings->setFile('data_cache.json');

  $KOCache = new \KO\Cache\Cache($KOCacheSettings);

  $AWSettings = new \KO\AmbientWeather\Settings();
  $AWSettings->setApiKey('your-key-here');
  $AWSettings->setApplicationKey('your-key-here');
  $AWSettings->setInterval(5);
  $AWSettings->setTimeframe(1);
  $AWSettings->setDevice('your-MAC-here');

  $AW = new \KO\AmbientWeather\AmbientWeather($AWSettings, $KOCache);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <script src="//cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.4/all/gauge.min.js"></script>
  </head>
  <body>

    <?php
        new KO\AmbientWeather\Charts\Wind($AW);
        new KO\AmbientWeather\Charts\Temperature($AW);
        new KO\AmbientWeather\Charts\Barometric($AW);
        new KO\AmbientWeather\Gauges\WindDirection($AW);
        new KO\AmbientWeather\Gauges\WindSpeed($AW);
    ?>

  </body>
</html>
```

## Documentation

See the full [Documentation](http://ko.karnsonline.com/ambient-weather) for more details.