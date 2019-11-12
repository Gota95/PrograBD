@extends ('welcome')
<?php
use App\Sucursal;
$alat=array();
$along=array();
	$sucursales=Sucursal::all();
	foreach ($sucursales as $sucursal) {
		 array_push($alat,$sucursal->latitud);
        array_push($along,$sucursal->longitud);
    
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
  
</div>
	<h1 class="bg-alert text-success font-weight-bold display-4">..Encuentramos en nuestra tienda más cercana..</h1>
	<div class="container align-items-center">
		<div class="text-center">
			
			<div id="mapa" class="container">	
				
			</div>
		</div>
	</div>
	<script>
    	var ala = [ '<?php echo implode("','",$alat);?>' ];
    	var alo = [ '<?php echo implode("','",$along);?>' ];
		navigator.geolocation.getCurrentPosition(localizacion,error);
		// Verificar si soporta geolocalizacion
		if (navigator.geolocation) {
			document.getElementById('mapa').innerHTML = "<h3>Tu navegador soporta Geolocalizacion<br>CARGANDO</h3><div class='spinner-border'></div> ";
		}else{
			document.getElementById('mapa').innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
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
		   var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
            '</div>'+
            '</div>';

			var infowindow = new google.maps.InfoWindow({
			content: contentString
			});
			var marker = new google.maps.Marker({
		      position: coord,
		      map: gmap,
			  title: "Usted está acá"
		    });
			marker.addListener('click', function() {
				infowindow.open(gmap, marker);
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