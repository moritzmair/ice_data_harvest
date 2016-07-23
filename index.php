
<?php

include "connect.php";

if($_GET['update']){
  $url = "http://ice.portal2/api1/rs/status";

  //emulate web browser
  $options = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad
    )
  );

  $context = stream_context_create($options);
  $file = file_get_contents($url, false, $context);
  echo $file;

  //print_r(get_headers($url));
  $train_data = json_decode($file, true);
  print_r($train_data);


  $sql = "INSERT INTO train_info (speed, longitude, latitude, timestamp)
  VALUES (".$train_data['speed'].", ".$train_data['longitude'].", ".$train_data['latitude'].", ".time().")";

  if ($db->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $db->error;
  }
}else{

?>
<script>
setInterval(function() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
         if (request.readyState == 4 && request.status == 200) {
            console.log(request.responseText);
         }
      }
    request.open('GET', 'http://localhost/htdocs/traininfo/index.php?update=true', true);
    request.send();

}, 1000);
</script>
<?php

}

$db->close();

?>
