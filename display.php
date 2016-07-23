<html>
  <head>
    <script src="jquery.js"></script>
    <script src="highcharts.js"></script>
  </head>
<body>
  <div id="container" style="width:100%; height:100%;"></div>
<script>

$(function () {
  var chart = new Highcharts.Chart(options);
  var options = {
    chart: { renderTo: 'container' },
    xAxis: { type: 'datetime' },
    series: []
};
});
<?php

include "connect.php";

$sql = "SELECT * FROM `train_info`";
$result = $db->query($sql);

while ($row = mysqli_fetch_array($result)) {
   $datetime = $row['timestamp'];
   $value = $row['speed'];
   $datetime *= 1000; // convert from Unix timestamp to JavaScript time
   $data[] = $value;
}
?>
var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'container'
      },
      series: [{
         data: [<?php echo join($data, ',') ?>],
         pointStart: 0,
         pointInterval: 1000
      }]
});

 </script>


</body>
</html>
