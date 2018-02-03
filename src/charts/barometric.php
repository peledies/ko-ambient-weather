<?php
namespace KO\AmbientWeather\Charts;

use KO\AmbientWeather\AmbientWeather;

class Barometric
{
  
  private $barometric = null;

  private $time = null;

  function __construct(AmbientWeather $aw)
  {
    $this->barometric = array_map(function($point){
      return $point->baromabsin;
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
  #baroChart {
    width: 100%;
    height: 400px;
  }
</style>

<canvas id="baroChart"></canvas>

<script>
  $(document).ready(function() {

    var baro = {$this->toJson($this->barometric)};
    var times = {$this->toJson($this->time)};

    var ctx = document.getElementById("baroChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: times,
            datasets: [
              {
                label: "Barometric Pressure (inHg)",
                  data: baro,
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.2)'
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)'
                  ],
                  borderWidth: 1
              }]
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
