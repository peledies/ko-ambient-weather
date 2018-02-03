<?php
namespace KO\AmbientWeather\Gauges;

use KO\AmbientWeather\AmbientWeather;

class WindSpeed
{
  
  private $speed = null;

  private $gust = null;
  
  private $maxGust = null;

  private $gustline = null;
  
  private $maxGustline = null;

  function __construct(AmbientWeather $aw)
  {
    $this->speed = $aw->currentConditions()->windspeedmph;
    
    $this->gust = $aw->currentConditions()->windgustmph;
    $this->maxGust = $aw->currentConditions()->maxdailygust;
    
    $this->gustline = $this->gust + 0.2;
    $this->maxGustline = $this->maxGust + 0.2;

    $this->render();
  }
  
  private function render(){
echo <<<EOT
<canvas id="gaugeWindSpeed"></canvas>
<script>
    var gauge = new RadialGauge({
        renderTo: 'gaugeWindSpeed',
        width: 300,
        height: 300,
        units: "mi/h",
        minValue: 0,
        maxValue: 40,
        majorTicks: [
            "0",
            "5",
            "10",
            "15",
            "20",
            "25",
            "30",
            "35",
            "40",
        ],
        minorTicks: 2,
        strokeTicks: true,
        highlights: [
            {
                "from": 20,
                "to": 30,
                "color": "rgba(200, 200, 50, .75)"
            },
            {
                "from": {$this->gust},
                "to": {$this->gustline},
                "color": "rgba(50, 200, 50, .75)"
            },
            {
                "from": {$this->maxGust},
                "to": {$this->maxGustline},
                "color": "rgba(255, 0, 0, .75)"
            },
            {
                "from": 30,
                "to": 40,
                "color": "rgba(200, 50, 50, .75)"
            }
        ],
        colorPlate: "#fff",
        borderShadowWidth: 0,
        borders: false,
        needleType: "arrow",
        needleWidth: 2,
        needleCircleSize: 7,
        needleCircleOuter: true,
        needleCircleInner: false,
        animationDuration: 1500,
        animationRule: "dequint",
        animateOnInit: true,
        useMinPath: true,
        valueText: "{$this->speed}",
        value: "{$this->speed}"
    }).draw();
</script>
EOT;
  }
}
