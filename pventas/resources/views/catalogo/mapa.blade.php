@extends ('welcome')
<?php

$conexion = mysqli_connect("localhost", "root", "","finalmapaprueba") or trigger_error(mysql_error(),E_USER_ERROR);

$alat=array();
$along=array();
$suc="SELECT * FROM sucursal";
    $p=mysqli_query($conexion,$suc);
    while ($op=mysqli_fetch_array($p)) {

        array_push($alat,$op['Latitud']);
        array_push($along,$op['Longitud']);
    }
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mapa Tienda</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style type="text/css">
    	#mapa
		{
		    position: fixed !important; 
		    height: 80% !important;
		    width: 85% !important;
		}
    </style>
  </head>
  @section('contentmapa')
  <body>
	<h1 class="bg-alert text-success font-weight-bold display-4">..Encuentramos en nuestra tienda más cercana..</h1>
	<div class="container align-items-center">
	<div id="mapa" class="container"></div>
	</div>
	<script>
    	var ala = [ '<?php echo implode("','",$alat);?>' ];
    	var alo = [ '<?php echo implode("','",$along);?>' ];
		navigator.geolocation.getCurrentPosition(localizacion,error);
		// Verificar si soporta geolocalizacion
		if (navigator.geolocation) {
			//output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
		}else{
			//output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
		}
		//Obtenemos latitud y longitud
		function localizacion(posicion){
			var lati = posicion.coords.latitude;
			var long = posicion.coords.longitude;
			var coord = {lat: lati ,lng: long};
		    var gmap = new google.maps.Map(document.getElementById('mapa'),{
		      zoom: 15,
		      center: coord
		    });
			var menor=[];
			var dl,dlo;
		    <?php
		    	$menor;
			    foreach ($alat as $l) {
			    	foreach ($along as $lo) {
			    		?>
			    			var dl=parseFloat('<?php echo $l; ?>')-lati;
			    			dl=dl.toFixed(10);
			    			var dlo=parseFloat('<?php echo $lo; ?>')-long;
			    			dlo=dlo.toFixed(10);
			    			
			    		<?php
			    	}?>
					var sum=Math.pow(dl,2)+Math.pow(dlo,2);
					sum=sum.toFixed(75);
					var distancia=Math.sqrt(sum);
					distancia.toFixed(100);
					menor.push(distancia);
					console.log("la distancia es:  "+distancia);
			    <?php }  
		    ?>
		    var mdis=0,indice=0;
		    for (var i = 0; i < menor.length; i++) {
		    	if(menor[0]>=menor[i] && i==0){
		    		mdis=menor[0];
		    		indice=0;
		    	}
		    	if(menor[i-1]>=menor[i]){
		    		mdis=menor[i];
		    		indice=i;
		    	}
		    }
		   console.log("la mayor(menor) distancia es: "+mdis+" Latitud es "+ala[indice]+" Longitud es: "+alo[indice]);
		    var marker = new google.maps.Marker({
		      position: coord,
		      map: gmap
		    });
		    var coord2 = {lat: parseFloat(ala[indice]),lng: parseFloat(alo[indice])};
		    var marker2 = new google.maps.Marker({
		      position: coord2,
		      map: gmap
		    });
		    //rutas
		    var objconfigDR={
			map: gmap
			}
			var objconfigDS={
			origin:marker.getPosition(),
			destination:marker2.getPosition(),
			travelMode: google.maps.TravelMode.DRIVING
			}


			var ds =new google.maps.DirectionsService();//obtener coordenadas

	      	var dr =new google.maps.DirectionsRenderer(objconfigDR);//coordenadas a rutas

	      	ds.route(objconfigDS,rutear);
	      	function rutear(resultados, status){
	      		//mostrar linea de los 2 puntos
	      		alert(resultados); 	
	      		if(status==google.maps.DirectionsStatus.OK){
	      			dr.setDirections(resultados);
	      		}
	      		else{
	      			alert('Error: '+status);
	      		}
	      	}
		    //console.log(google.maps.geometry.spherical.computeDistanceBetween(marker.getPosition(), marker2.getPosition()));
		}
		function error(){
			divMapa.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
		}
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAboy53WFKi8zEw2KKZlxIyjqAWlX7Mhj4&libraries=geometry"></script>
  </body>
</html>
@endsection