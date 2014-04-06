<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Search Marker</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>			
<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
<link href="dock-menu/style.css" rel="stylesheet" type="text/css" />
<!-- Favicon -->
<link rel="icon" type="image/png" href="favicon_syarif.png"/>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="search-d4.js"></script>

 <div id="map" </div>

<script type="text/javascript">
    //<![CDATA[


<?php
		 
	//$sql =  "select * from marker_d4 where 1;";
	$sql = "SELECT * FROM `marker_d4` INNER JOIN `icon` ON marker_d4.IconID = icon.IconID where MarkerID='$edit' LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>

    if (GBrowserIsCompatible()) {

      function createMarker(point,html) {
        var marker = new GMarker(point);

        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }
      function createMarkerWithIcon(point,icon,html) {
		// Create our "tiny" marker icon
		var blueIcon = new GIcon(G_DEFAULT_ICON);
		blueIcon.image = icon;
						
		// Set up our GMarkerOptions object
		markerOptions = { icon:blueIcon };

        var marker = new GMarker(point, markerOptions);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }

    /* map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);*/

	 var map = new GMap2(document.getElementById("map"));
	  map.setCenter(new GLatLng(<?php echo $data['Latitude'].','. $data['Longitude'];?>), 11);

  // Select a map type which supports obliques
     //map.setMapType(G_HYBRID_MAP);
       map.setMapType(G_NORMAL_MAP);
       map.setUIToDefault();

      // Enable the additional map types within
      //the map type collection
      map.enableRotation();

	
	
       var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['IconImage'];?>",'<center>== <?php echo $data['Title'];?> == <br/><br><?php echo $data['TextHTML'];?> <br/>Koordinat : <?php echo $data['Longitude'];?>, <?php echo $data['Latitude'];?> <br/>Alamat : <?php echo $data['Address'];?> <br/></center>')
		  
      map.addOverlay(marker);
	<?php
	}
	?>

    }

    
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    </script>



  </body>
 

		<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="sidebar/includes.js"></script>
		<!-- saved from url=(0014)about:internet -->
		<!-- script type="text/javascript" src="sidebar/html.js"></script-->
		<!-- <script type="text/javascript" src="./add.js"></script>-->
		<script type="text/javascript" src="./icon.js.php"></script>
		<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
		<script type="text/javascript" src="search-d4.js"></script>
		<script type="text/javascript"></script>

  
			<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				<?php
				include "dock-menu/dockMenuhome.html";
				?>
	

  <!-- <div id="mapCanvas"></div> -->
  
  <div id="infoPanel">
    <div id="tempStorage" style="display:none;"></div>

    <div id="sideBar">
      <a href="#" id="sideBarTab" name="sideBarTab"><img src=
      "sidebar/assets/spacer.gif" alt="" title="" /></a>

      <div id="sideBarContents" style="display:none;">
        <div id="sideBarContentsInner">
          <div id="scrollbar_container">
            <div id="scrollbar_content">

  <div id='Marker'>
    <div id='Judul'>
   Ketikan lokasi yang anda cari 
    </div>
    
 
 

   	<div id='login'>
			<div>
				<br>
				
	
      <input class="inp" placeholder="Search" name="Search" title="Search" id=
      "kata" type="text" size="25" onkeyup=lihat(this.value)><br/>

		<div id=kotaksugest>
		</div>

	
			</div>

          </div>
        </div>
      </div>
    </div>
	
  </div>
 </html>
