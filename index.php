<?php 
session_start();
include "connect.php";		 
?> 
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Peta Lokasi Magang Mahasiswa D4 ITB Kerma SEAMOLEC Batch VIII</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>	
<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
<script type="text/javascript" src="search-d4.js"></script>
<!-- Favicon -->
<link rel="icon" type="image/png" href="favicon_syarif.png"/>
<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
<link href="dock-menu/stylehome.css" rel="stylesheet" type="text/css" />
<link href="../gis-bangkinang/style.css" rel="stylesheet" type="text/css" />
<!-- Google Analytics
Saturday, January 12, 2013 10:30:28 AM -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37613313-1']);

  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ?  'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript"></script>

</head>

<body onunload="GUnload()">
<?php include_once("analyticstracking.php") ?>

  <div id="page">
   <br>Sistem Informasi Geografis Lokasi Magang Mahasiswa D4 <br/>
   Institut Teknologi Bandung Kerma SEAMOLEC Batch VIII
    <!-- <div id="header">
	
    </div> -->

        <div id='peta'>
	<div id='search'>
		
				<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				<?php
				include "dock-menu/dockMenuhome.html";
				?> 


			 <img src="../gis-bangkinang/images/search.png" width="30" height="" alt="Search"/> 
			<input class="inp" placeholder="search" name="Search" title="Search" id=
                                  "kata" type="text" size="15"  onkeyup=lihat(this.value) >     
                   
									<div id=kotaksugest></div>
	</div>

          <div id='Judul'>
          <a href="view.php"style=
				"text-decoration:none;color:#ffffff;" title="Layar Penuh"> <blink> Full Map </blink>  </a>
				<br>
				

				<div id="map">

		
    <script type="text/javascript">

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
       //Friday, 04 April 2014, 19 : 41 : 33 WIB  
	   //Center Sabbang
	   //Luwu Utara, Sulawesi Selatan
      var map = new GMap2(document.getElementById("map"));
	  map.setCenter(new GLatLng(-2.5773593,119.4708312), 4);

      // Select a map type which supports obliques
      //map.setMapType(G_HYBRID_MAP);
	map.setMapType(G_NORMAL_MAP);
      map.setUIToDefault();

      // Enable the additional map types within
      //the map type collection
      map.enableRotation();
    
	/*var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);*/
    


	<?php
	//$sql =  "select * from marker_d4 where 1;";
	$sql = "SELECT * FROM `marker_d4` INNER JOIN `icon` ON marker_d4.IconID = icon.IconID";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
          var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['IconImage'];?>",'<center>== <?php echo $data['Title'];?> == </center><br/><?php echo $data['TextHTML'];?> <br/>Koordinat : <?php echo $data['Longitude'];?>, <?php echo $data['Latitude'];?> <br/>Alamat : <?php echo $data['Address'];?> <br/>')
		  
		  
      map.addOverlay(marker);
	<?php
	}
	?>

    }

    
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    </script>



		 </div>
        </div>
      </div>
	<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				
      <div id="footer">
     
       <a href="http://mhdsyarif.com" style=
				"text-decoration:none;color:#fff;" target="_blank">&nbsp;&nbsp;Design by Mhd. Syarif<br/><br/>
		<a href="http://tif.poltek-kampar.ac.id" style=
				"text-decoration:none;color:#fff;" target="_blank">&nbsp;&nbsp;Copyright &copy; 2012-2014 TIF '09 Politeknik Kampar<br/>
				<!-- Friday, 27 December 2013, 14 : 54 : 04 WIB  -->
				<!-- Histats.com  START  (standard)-->
				<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
				<a href="http://www.histats.com" target="_blank" title="hit counter script" ><script  type="text/javascript" >
				try {Histats.start(1,2549737,4,1029,150,25,"00011111");
				Histats.track_hits();} catch(err){};
				</script></a>
				<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2549737&101" alt="hit counter script" border="0"></a></noscript>
				<!-- Histats.com  END  -->
  
    </div>
  </div>
</body>
</html>
