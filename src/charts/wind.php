<?php
namespace KO\AmbientWeather\Charts;

use KO\AmbientWeather\AmbientWeather;

class Wind
{
  
  private $wind = null;

  private $gust = null;
  
  private $time = null;

  function __construct(AmbientWeather $aw)
  {
    $this->wind = array_map(function($point){
      return $point->windspeedmph;
    }, $aw->getData());

    $this->gust = array_map(function($point){
      return $point->windgustmph;
    }, $aw->getData());

    $this->time = array_map(function($point){
      return date('M-j G:i', $point->dateutc/1000);
    }, $aw->getData());

    $this->render();
  }
  
  private function toJson($val){
    return json_encode($val);
  }
  
  private function render(){
echo <<<EOT
<style>
  #windChart {
    width: 100%;
    height: 400px;
  }
</style>

<canvas id="windChart"></canvas>

<script>
  $(document).ready(function() {

    var wind = {$this->toJson($this->wind)};
    var gust = {$this->toJson($this->gust)};
    var time = {$this->toJson($this->time)};

    var ctx = document.getElementById("windChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: time,
            datasets: [
              {
                label: "Wind Speed (mph)",
                  data: wind,
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.2)'
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)'
                  ],
                  borderWidth: 1
              },
              {
                label: "Wind Gust (mph)",
                  data: gust,
                  backgroundColor: [
                      'rgba(0, 255, 0, 0.2)'
                  ],
                  borderColor: [
                      'rgba(0, 255, 0, 1)'
                  ],
                  borderWidth: 1,
                  fill: false
              }
            ]
        },
        options: {
              responsive: false,
              title: {
                  display: true,
                  text: 'Data'
              }
          }
    });
  });
</script>
EOT;
  }
}
