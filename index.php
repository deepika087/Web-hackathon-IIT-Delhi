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
        if (!$(this).hasClass('active'))
        {
          console.log('Adding class onclick');
          $(this).addClass('active');
        }
      });
    });

      /**
      Home page will always show the Delhi(Hackathon's) location. 
      **/
    function initialize() {
      var mapProp = {
        center:new google.maps.LatLng(28.6139391,77.20902120000005  ),
        zoom:7,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var marker=new google.maps.Marker({
      position:new google.maps.LatLng(28.6139391,77.20902120000005  ),
      animation:google.maps.Animation.BOUNCE
      });
      marker.setMap(map);
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
    <div class="col-md-9">
      <div id="googleMap" style="width:1000px;height:400px;">   </div>
      <br />
      <div class="row"> 
        <form  role="form" method="post" action=".\SaveLocation.php" >
            <table class="table">
                <tr>
                    <td> <label class="control-label col-sm-2" >UserId:</label></td>
                    <td> <input type="text" class="form-control" id="id" name="id" placeholder="Enter the user's unique ID" ></td>
                    <td> <sup>*</sup> Leave it empty if you are not sure, Database will generate a key</td>
                </tr>
                <tr></tr>
                <tr>
                    <td> <label class="control-label col-sm-2" >Latitude:</label></td>
                    <td> <input type="text" class="form-control" id="latitude" name="latitude" placeholder="28.6139391"></td>
                </tr>
                <tr></tr>
                <tr>
                    <td> <label class="control-label col-sm-2" >Langitude:</label></td>
                    <td> <input type="text" class="form-control" id="langitude" name="langitude" placeholder="77.20902120000005"></td>
                </tr>
              </table>
        <center><input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary"></center> 
        </form>
      </div>
    </div>
  <div>
</div>
</body>
<html>
