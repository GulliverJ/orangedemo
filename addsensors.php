<?php
 require('user_manager.php');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css">

  
  <meta charset="utf-8">
  <style>
    #map {
      width: 100%;
      height: 500px;
      margin: 16px;
    }
  </style>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
  <script>

    function initialize() {
      var myLatLng = new google.maps.LatLng(51.524636, -0.132036);

      var mapOptions = {
        zoom: 15,
        center: myLatLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById('map'), mapOptions);

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Set lat/lon values for this property',
        draggable: true
      });

      google.maps.event.addListener(map, 'zoom_changed', function() {
        var zoomLevel = map.getZoom();
        map.setCenter(map.getCenter());
        infowindow.setContent('Zoom: ' + zoomLevel);
      });

      google.maps.event.addListener(map, "idle", function() {
        marker.setPosition(map.getCenter());
        $("#latin").val(map.getCenter().lat().toFixed(6));
        $("#lngin").val(map.getCenter().lng().toFixed(6));
      });

      google.maps.event.addListener(marker, "dragend", function(mapEvent) {
        map.panTo(mapEvent.latLng);
      });

      google.maps.event.addDomListener(window, 'load', initialize);
    }

  </script>

  <title>Add Sensors</title>

</head>
<body onload="initialize()">
      <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <?php
                $sign = "SIGN IN";
                $signlink = "#";
                    if(LoggedIn()) { ?>
                        <p class='navbar-text' style="color:#ffffff">Logged in as <?php echo GetUserName(); ?>.</p>
                        <!--<a href="logout.php"><p class='navbar-text'>Log out</p></a>-->
                        <?php
                            $sign = "SIGN OUT";
                            $signlink = "logout.php";
                    }
                    ?>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-menu">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">HOME</a></li>
                <li><a href="features.html">FEATURES</a></li>
                <li class="active"><a href="<?php echo $signlink ?>"><?php echo $sign ?></a></li>
                <li><a href="#">ABOUT US</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

 <section class="content">
        <div class="container">

<?php
if(LoggedIn()) {
?>
<!-- Any HTML code to be displayed for a user who IS logged in goes here -->

  <h1>Add New Sensors</h1><br>
  <div class='row'>
      <div class='col-md-3'></div>
      <div class='col-md-6'>
          <a href="portal.php" class = 'btn btn-block btn-success'>Return to Management Portal</a><br>
      </div>
      <div class='col-md-3'></div>
  </div>
  <form name="addsensor" method="post" action="sensor_manager.php" id="addsensor" novalidate>
    <label for="application">Sensor Application</label>
    <input name="application" id="application" type="text" placeholder="Label your sensor"><br><br>



--



<div class="dropdown">
  <label for="measures">What does the sensor measure?</label>
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <option value="" selected disabled>Choose a property</option>
    <span class="caret"></span>
  </button>
  <select name="measures" id="measures" style="width: 350px">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
      <li role="presentation"><a role="menuitem" tabindex="-1">
        <option value="audio">Audio</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1">   
        <option value="distance">Distance</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1">
        <option value="humidity">Humidity</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1"> 
        <option value="light">Light Intensity</option>
      </a></li>

      <li role="presentation"><a role="menuitem" tabindex="-1">
         <option value="pressure">Pressure (all)</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1">   
        
        <option value="radiation">Radiation</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1">
        
        <option value="rainfall">Rainfall</option>
      </a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1"> 
         <option value="temperature">Temperature</option>
      </a></li>

      <li role="presentation"><a role="menuitem" tabindex="-1"> 
          <option value="windspeed">Windspeed</option>
      </a></li>
    </select><br><br>
  </ul>
</div>






--

    
    
     
     
      
   
     
     
     
   
    <!-- TODO: make this intelligent with JQuery (show distance units when "distance" is selected) -->
    <label for="unit">Which unit will the data have?</label>
    <select name="unit" id="unit" style="width: 350px">
      <option value="" selected disabled>Choose a unit</option>
      <option value="none">none</option>
      <option value="mm">Millimetres</option>
      <option value="cm">Centimetres</option>
      <option value="m">Metres</option>
      <option value="mph">Miles per hour</option>
      <option value="kmph">Kilometers per hour</option>
      <option value="mps">Meters per second</option>
      <option value="mps2">Meters per second squared</option>
      <option value="dB">Decibels</option>
      <option value="C">Celcius</option>
      <option value="F">Fahrenheit</option>
      <option value="K">Kelvin</option>
    </select><br><br>
    <p>Where exactly will your sensor be positioned</p>
    <label for="lat">Latitude</label>
    <input name="lat" id="latin" type="number" step="0.000001" placeholder="Lat" value = ""><br><br>
    <label for="lng">Longitude</label>
    <input name="lng" id="lngin" type="number" step="0.000001" placeholder="Lng" value - ""><br><br>
    <button type="submit" name="add">Register this sensor</button><br>
        <div id="map">
      </div>
  </form>

<?php
} else {
?>
  <!-- Any HTML code to be displayed for a user who isn't logged in goes here -->
<h1> Notice: </h1>
<h4>You must be logged in to add sensors. Click <a href="index.php">here</a> to log in.</h4>

<?php
}
?>


  </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>