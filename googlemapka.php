<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="map.js"></script>
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #data {
        display: none;
      }
    </style>
  </head>
  <body>
      <?php require 'core.php';
        
        $comp = new Companies;
        $companies = $comp->getCompanies();
          

        // var_dump($companies);
        

        echo '<div id="data">' . $companies . '</div>'; 
      ?>
  
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqTLYY1qqgMwxhKmwXmavj6aHNtgJBW-I&callback=initMap"
    async defer></script>
    
    

    
  </body>
</html>