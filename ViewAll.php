<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
       $('.nav.nav-pills.nav-stacked li a').first(function(e) {
        console.log('capttured event in the ready stage itself');
        if (!$(this).hasClass('active'))
        {
          console.log('Adding class in the ready stage itself');
          $(this).addClass('active');
        }
      });

      $('.nav.nav-pills.nav-stacked li a').click(function(e) {
        console.log('capttured event onclick ');
        if (!$(this).hasClass('active'));
        {
          console.log('Adding class onclick');
          $(this).addClass('active');
        }
      });
      $('#submit').click(function(event) {
        alert("Received event");
        var address = $('#location').val();
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      });
    });

    function initialize() {
      var request = $.ajax({
            url: "./GetAllLocationsFromDatabase.php",
            type: "GET",      
            dataType: "json"
          });

          request.done(function(json) {
            
            var mapProp = {
                center:new google.maps.LatLng(28.6139391,77.20902120000005  ),
                zoom:7,
                mapTypeId:google.maps.MapTypeId.ROADMAP
              };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            console.log("reached here");
            for (i = 0, len = json.length; i < len; i++) {
              e=json[i];
              console.log(e.userId + " --" + e.lat);

              var lat = parseFloat(e.lat);
              var lng = parseFloat(e.lang);
              var marker=new google.maps.Marker({
                position:new google.maps.LatLng(lat, lng),
                animation:google.maps.Animation.BOUNCE
                });
                marker.setMap(map);
            }
          });

          request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
          });
    }
    
    
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</head>

<body>
<div class="container">
  <img class="img-responsive" src=".\Images\hackathon.png" alt="Chania" height="40" width="200" align="center">
</div>
<div class="container-fluid">
  <div class="row">
  	<div class="col-md-3" style="background-color:black;color:white;float:left;height:700px">
      <ul class="nav nav-pills nav-stacked">
      
        <li ><a href=".\index.php"><center>Add User</center></a></center></li>
		    <li><a href=".\ViewAll.php"><center>Segment Users </center></a></li>
		    <li><a href=""><center>Send Notification</center></a></li>
		    
      </ul>
    </div>
    <div class="col-md-6">
      <div id="googleMap" style="width:1000px;height:400px;">   </div>
      <br />
      <div class="row"> 
        
            <table class="table">
                <tr>
                    <td> <label class="control-label col-sm-2" >Area:</label></td>
                    <td> <input type="text" class="form-control" id="location" name="location" placeholder="New Delhi" ></td>
                </tr>
                <tr> </tr>
                <tr>
                    <td> <label class="control-label col-sm-2" >Radius:</label></td>
                    <td> <input type="text" class="form-control" id="radius" name="radius" placeholder="(in meters)"></td>
                </tr>
                <tr></tr>
              </table>
          <center><input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"></center> 
        
      </div>
    </div>

  <div>
</div>
</body>
<html>
