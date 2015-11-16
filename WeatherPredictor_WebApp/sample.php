<?php

 $street= $_GET['street'];
 $city= $_GET['city'];
 $state = $_GET['state'];
 $temp = $_GET['degree'];
 $valstat = $_GET['valstate']; 

 $address = $street.",".$city.",".$state;
 $address = urlencode($address);
 $geocodeapi = "AIzaSyBq2fnw4bPxTn00kH9uqMs8Fj5UQ8RLDHE";
    
  //url address to request for the geocode.
  $geourl = "https://maps.google.com/maps/api/geocode/xml?address={$address}&key={$geocodeapi}";
    
  $data = file_get_contents($geourl) or die ("Invalid Address"); 
   $xmldata = simplexml_load_string($data);

  $latitude = $xmldata->result->geometry->location[0]->lat;
  $longtitude = $xmldata->result->geometry->location[0]->lng;
   
   $unit = "";    
   $forecastapi = "3d0e91a04fbb2afae99110a7fdd4c1a8";
    if($temp == "Celsius"){
        
        $unit = "si";
    }
    elseif($temp == "Fahrenheit") {
        $unit = "us";
    }
    
    $querystring = "units={$unit}&exclude=flags";
    $forcasrurl = "https://api.forecast.io/forecast/{$forecastapi}/$latitude,$longtitude?";
    
    $forcasrurl .=$querystring;
    //echo "<br/>".$forcasrurl;
    
    $querystring = urlencode($querystring);
    //$forcasrurl =  urlencode($forcasrurl);
    $forcasrurl .=$querystring;
    //echo "<br/>".$forcasrurl;

    $weatherdata = file_get_contents($forcasrurl);
    $weatherdata = json_encode($weatherdata);
    echo $weatherdata;
    
?>
