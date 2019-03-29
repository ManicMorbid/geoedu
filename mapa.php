<?php
  function points(){
    $dsn = 'mysql:hosy=localhost;dbname=geoedu';
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "geoedu";
    
    
    try{
      $conn = new PDO($dsn,$dbUsername,$dbPassword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $ex) {
      //echo 'Not Connected '.$ex->getMessage();
    }
    
    
    $stmt = $conn->prepare('SELECT institution_lat, institution_lng, institution_id FROM   institution ');
    $stmt->execute();
    $pnts = $stmt->fetchAll();
    // echo json_encode($pnts);
    return json_encode($pnts);    
  }
?>



<!DOCTYPE html>
<html>
<head>
  
  

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>


  
</head>
<body>


<div align="center">
<div id="mapid" style="width: 700px; height: 450px;"></div>

<script>
  
  var mymap = L.map('mapid').setView([-16.497612, -68.135791], 15);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 20,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(mymap);
    
  var puntos = <?php echo points(); ?>;
  
  for (let i=0; i<puntos.length; i++) {
    var x = puntos[i]['0'];
    var y = puntos[i]['1'];
    var z = puntos[i]['2'];
    L.marker([ x, y ]).addTo(mymap).bindPopup('<a href="signup.php">Ir a...</a>').openPopup();
  }
  var popup = L.popup();
  function onMapClick(e) {
     popup
     .setLatLng(e.latlng)
     .setContent(e.latlng.toString())
     .openOn(mymap);
  }
  mymap.on('click', onMapClick);
  

  

</script>


</div>
</body>
</html>


