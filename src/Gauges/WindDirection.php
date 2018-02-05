<?php
namespace KO\AmbientWeather\Gauges;

use KO\AmbientWeather\AmbientWeather;

/**
* Render a Wind Direction Gauge
*
* @example
* <code>
*   new KO\AmbientWeather\Gauges\WindDirection($AW);
* </code>
*
* @return string - HTML/Javascript
*
* @since   0.0.1
* @author  Deac Karns <peledies@gmail.com> 
**/
class WindDirection
{
  
  private $bearing = null;

  function __construct(AmbientWeather $aw)
  {
    $this->bearing = $aw->currentConditions()->winddir;

    $this->render();
  }
  
  private function render(){
echo <<<EOT
<canvas id="ko-gauge-wind-direction"></canvas>
<script>
    new RadialGauge({
        renderTo: 'ko-gauge-wind-direction',
        width: 300,
        height: 300,
        minValue: 0,
        maxValue: 360,
        majorTicks: [
            "N",
            "NE",
            "E",
            "SE",
            "S",
            "SW",
            "W",
            "NW",
            "N"
        ],
        minorTicks: 22,
        ticksAngle: 360,
        startAngle: 180,
        strokeTicks: false,
        highlights: false,
        colorPlate: "#33a",
        colorMajorTicks: "#f5f5f5",
        colorMinorTicks: "#ddd",
        colorNumbers: "#ccc",
        colorNeedle: "rgba(240, 128, 128, 1)",
        colorNeedleEnd: "rgba(255, 160, 122, .9)",
        valueBox: false,
        valueTextShadow: false,
        colorCircleInner: "#fff",
        colorNeedleCircleOuter: "#ccc",
        needleCircleSize: 15,
        needleCircleOuter: false,
        animationRule: "dequint",
        needleType: "line",
        needleStart: 75,
        needleEnd: 99,
        needleWidth: 3,
        borders: true,
        borderInnerWidth: 0,
        borderMiddleWidth: 0,
        borderOuterWidth: 10,
        colorBorderOuter: "#ccc",
        colorBorderOuterEnd: "#ccc",
        colorNeedleShadowDown: "#222",
        borderShadowWidth: 0,
        animationTarget: "plate",
        title: "DIRECTION",
        fontTitleSize: 19,
        colorTitle: "#f5f5f5",
        animationDuration: 1500,
        animateOnInit: true,
        useMinPath: true,
        valueBox: true,
        valueText: "{$this->bearing}˚",
        value: "{$this->bearing}"
    }).draw();
</script>
EOT;
  }
}
