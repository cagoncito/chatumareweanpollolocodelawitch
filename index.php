
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/i/favicon.ico">

    <title>Alerta pc </title>

    <!-- Bootstrap core CSS -->
 <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      html,body{
        height:100%;
        }

        #map-canvas {
          background: transparent no-repeat 0 0;
          width: 100%;
          height: 100%;
          float: left;
          filter: alpha(opacity=80);
          -moz-opacity: 0.8;
          -khtml-opacity: 0.8;
          opacity: 0.8;
          margin-top: 51px;

        }


.navbar-inverse {
  margin-bottom:0;
}

.navbar-header figure{

  float: left;
  position: relative;
  width: 200px;
  height: 50px

 }

 .navbar-header figure #logo{

  border-right: 1px solid white;
  margin-right: 0.5em;

 }

 .navbar-header figure #logo img{
  margin-right: 0.5em;
  padding-right: 0.5em;
  width: 25px;
}
 .img-logo {
  padding: 0.5em 0.1em 2em 0.1em;
  width: 140px;
  height: 75px;

 }

 .footer{
  color: rgba(255,255,255,0.7);
  background: #000000;


 }

 .navbar-footer{
  text-align: center;
 }

    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <figure id="logo">
      <img src="logo.png"  class="img-responsive img-logo" />
    </figure>
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="map-canvas"></div>
    <div class="container" style="position:absolute;top: 70px;">
      

      <!-- Main component for a primary marketing message or call to action -->
      <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <div class="alert alert-info fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4>Oh snap! You got an error!</h4>
              <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
        </div>
      </div>

      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    <script>
      function initialize() {
        getLocation(); 
        set_current_location();
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      function getLocation(){
        if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(success, error);
        } else {
          // default location
        }
      }

      function success(position){
        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        var mapOptions = {
          center: latlng,
          mapTypeControl: false,
          zoom: 18
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }

      function error(msg){
        if (msg.code == 1) {
            //PERMISSION_DENIED 
        } else if (msg.code == 2) {
            //POSITION_UNAVAILABLE 
        } else {
        }   //TIMEOUT
      }

      function set_current_location() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function (position) {
                  /*
                  var pos = new google.maps.LatLng(position.coords.latitude,
                                                   position.coords.longitude);
                  var myLat = position.coords.latitude;
                  var myLong = position.coords.longitude;
                  */
                  add_location('My location', 
                              position.coords.latitude, 
                              position.coords.longitude);
                              
                  set_markers(new google.maps.LatLngBounds(), map);
              }, function error(err) {
                  console.log('error: ' + err.message);
                  set_markers(new google.maps.LatLngBounds(), map);            
              });
          } else {
              alert("Geolocation is not supported by this browser.");
              //set_markers(new google.maps.LatLngBounds(), map);
          }
      }

    </script>

    <footer>
      <div class="footer navbar-fixed-bottom">
      <div class="container">
      <div class="navbar-footer">
        <button type="button" class="btn btn-default navbar-btn" id="entrar">Entrar</button>
        <button type="button" class="btn btn-default navbar-btn" id="registro">Registrate</button>
      </div>
      </div>
      </div>
    </footer>
  </body>
</html>
