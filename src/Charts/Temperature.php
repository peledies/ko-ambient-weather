<?php
namespace KO\AmbientWeather\Charts;

use KO\AmbientWeather\AmbientWeather;

class Temperature
{
  
  private $temperature = null;

  private $time = null;

  function __construct(AmbientWeather $aw)
  {
    $this->temperature = array_map(function($point){
      return $point->tempf;
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
<canvas id="ko-chart-temperature"></canvas>

<script>
  $(document).ready(function() {

    var temp = {$this->toJson($this->temperature)};
    var times = {$this->toJson($this->time)};

    var ctx = document.getElementById("ko-chart-temperature");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: times,
            datasets: [
              {
                label: "Temperature (Farneheit)",
                  data: temp,
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
              responsive: true,
              title: {
                  display: true,
                  text: 'Temperature'
              }
          }
    });
  });
</script>
EOT;
  }
}
