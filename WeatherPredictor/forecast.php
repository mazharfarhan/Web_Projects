<!DOCTYPE html>
<html>
<head>
<title>Weather Forecast</title>    
<style>

h1,form,div {
    
    margin-left:20%;
}
    
strong {
    
   margin-left:100px;   
}
    
form {   

     border: 2px solid black;
     width : 30%;
     height : 260px;
     padding: 10px;
 }

input {
    margin-left : 30px;
}
    
div {
    outline:2px solid black;
    height : 500px;
    width : 40%;
}

h1#result {
    
   margin-left : 170px;
   padding-top:20px;    
}
    
p#text {
    
  font-weight: 500;
  font-size: 17px;  
  margin-left : 70px;       
}

    
.text1 {
    padding-left : 100px;
}
.text2 {
    padding-left : 85px;
}    
.text3 {
    padding-left : 105px;
}   
.text4 {
    padding-left : 115px;
}  
.text5 {
    padding-left : 122px;
}  
.text6 {
    padding-left : 133px;
} 
.text7 {
    padding-left : 138px;
}
.heading {
 
    margin-left : -30px;
}    
</style>    
    
<script>

function validateform() {
    
 var formdetails = document.getElementsByTagName("form");    
 var street = formdetails[0]["address"].value;
 var city =  formdetails[0]["city"].value;   
 var state = formdetails[0]["state"].value;
    
 if(street == null || street == "" ) {
   alert ("Please enter the street address");
   return false;     
 }
    
 if(city == null || city == "" ) {
   alert ("Please enter the city name");
   return false;     
 }
    
  if(state == "Select your state" ) {
   alert ("Please select the state from the drop down list");
   return false;     
 }
   
}

function resetform() {
 
    var formdetails = document.getElementsByTagName("form");
    formdetails[0]["address"].value="";
    formdetails[0]["address"].setAttribute("value", "");
    formdetails[0]["city"].value="";
    formdetails[0]["city"].setAttribute("value", "");
    formdetails[0]["state"].value="Select your state";
    formdetails[0]["state"].setAttribute("value", "Select your state");
    
    document.getElementById("fare").checked = "checked";
    
    var body = document.getElementById("bodytag");
    var resultform = document.getElementById("resultform");
    body.removeChild(resultform);

}
    
</script>    
</head>
<body id="bodytag">
<h1><strong>Forecast Search</strong></h1>    
  
<form onsubmit="return validateform()" method="post" onreset="resetform()" action="forecast.php">
    
Street Address:*<input type="text" id="address" name="address"/>
<br/></br>    
City:* <input type="text" id="city" name="city" style="margin-left :90px"/> 
<br/><br/> 
State:* <select name="state" id="state" size="1" style="margin-left :85px">
    <option> Select your state </option>
    <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>    
<br/><br/> 
Degree:* <input type="radio" id="fare" name="degree" value="Fahrenhiet" checked>Fahrenheit </input> 
<input type="radio" name="degree" id="cel" value="Celsius">Celsius </input> 
<br/>
<input type="submit" name="submit" value="Search" style="margin-left :85px"/>
<input type="reset" name="clear" value="Clear"/>
<br/>
<p><i>*-Mandatory fields</i></p> 
<a href="http://forecast.io/" target="_blank" style="margin-left :90px" >Powered by Forecast.io</a>

</form>

<?php
    
    if($_POST == null){
        exit;
    }

    $street= $_POST['address'];
    $city= $_POST['city'];
    $state = $_POST['state'];
    $temp = $_POST['degree'];
    
    // Converting the address to pass it as a query parameter
    $address = $street.",".$city.",".$state;
    $address = urlencode($address);
    $geocodeapi = "AIzaSyBq2fnw4bPxTn00kH9uqMs8Fj5UQ8RLDHE";
    
    //url address to request for the geocode.
    $geourl = "https://maps.google.com/maps/api/geocode/xml?address={$address}&key={$geocodeapi}";
    
    $data = file_get_contents($geourl);
    //echo $geourl;
    //echo $geourl;
    //echo "</br></br>";
    
    //initialize the curl session
    //$curlhandle = curl_init();
    //curl_setopt($curlhandle, CURLOPT_URL, $geourl);
    //curl_setopt($curlhandle, CURLOPT_RETURNTRANSFER, 1);

    //$data = curl_exec($curlhandle);
    //curl_close($curlhandle);
    $xmldata = simplexml_load_string($data);
    //print_r($data);
    //echo "</br></br>";

    $latitude = $xmldata->result->geometry->location[0]->lat;
    $longtitude = $xmldata->result->geometry->location[0]->lng;
    //echo $latitude."  ".$longtitude ;
    
 
    // Setting up the url for forecast api.
    $forecastapi = "3d0e91a04fbb2afae99110a7fdd4c1a8";
    if($temp == "Celsius"){
        
        $unit = "si";
    }
    elseif($temp == "Fahrenhiet") {
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
    $weatherdata = json_decode($weatherdata,true);
    //echo "<br/>";
    //echo "<pre>";
    //print_r($weatherdata);
    //echo "</pre>";

    // reading the parsed json data
    $wcondition =  $weatherdata['currently']['summary'];
    $wtemperature = $weatherdata['currently']['temperature'];
    $wtemperature = round($wtemperature);
    if (  $unit == "si" ) {
        
        $wtemperature = $wtemperature."&deg; "."C";    
    }
    else {

        $wtemperature = $wtemperature."&deg; " ."F";    
    }

    $weathericon = $weatherdata['currently']['icon'];
    $weathermes= $weathericon;
    switch($weathericon) {
            
        case "clear-day": $weathericon= "clear.png";
                           break;
            
        case "clear-night" : $weathericon= "clear_night.png";
                           break;
            
        case "rain" :      $weathericon= "rain.png";
                           break;
            
        case "snow" :      $weathericon= "snow.png";
                           break;
        
        case "sleet" :     $weathericon= "sleet.png";
                           break;
            
        case "wind" :      $weathericon= "wind.png";
                           break;
        
        case "fog" :       $weathericon= "fog";
                           break;
            
        case "cloudy":    $weathericon= "cloudy.png";
                           break;
            
        case "partly-cloudy-day" : $weathericon= "cloud_day.png";
                           break;
            
        case "partly-cloudy-night" : $weathericon= "cloud_night.png";
                           break;
               
    }
     
    //percipitation data
    $wprecipitation =  $weatherdata['currently']['precipIntensity'];
    if($unit == "si") {
         $wprecipitation = $wprecipitation / 25.4;   
        
    }
    

    switch($wprecipitation) {
            
        case 0 :        
        case ($wprecipitation < 0.002):
                        $wprecipitation = "None";
                        break;
            
        case ($wprecipitation >= 0.002 && $wprecipitation < 0.017) :     $wprecipitation = "Very Light";
                        break;
            
        case ($wprecipitation >= 0.017 && $wprecipitation < 0.1) :     $wprecipitation = "Light";
                        break;
            
        case ($wprecipitation >= 0.1 && $wprecipitation < 0.4)   :       $wprecipitation = "Moderate";
                        break;
            
        case ($wprecipitation >=0.4)                    :       $wprecipitation = "Heavy";
                        break;
    }
    
   //percentage for rain 
   $wrain  = $weatherdata['currently']['precipProbability'];
   $wrain  = ($wrain * 100 )."%";     
   
   //wind speed
   $windspeed = $weatherdata['currently']['windSpeed'];     
   if ($unit == "si") {
    $windspeed =   $windspeed * 2.236936;
   }
   $windspeed = round($windspeed);    
   $windspeed .=" mph"; 
   
   //dewpoint
    $dewpoint = round($weatherdata['currently']['dewPoint']);
     if (  $unit == "si" ) {
        
        $dewpoint = $dewpoint."&deg; "."C";    
    }
    else {

        $dewpoint = $dewpoint."&deg; " ."F";    
    }

    

    //humidity
    $humidity  = $weatherdata['currently']['humidity'];
    $humidity  = ($humidity * 100 )."%"; 
    

    //visibility
    $visibility = $weatherdata['currently']['visibility'];     
    if ($unit == "si") {
    $visibility =   $visibility * 0.621;
    }
    $visibility = round($visibility);    
    $visibility .=" mi"; 
   
    $timezone = $weatherdata['timezone'];
    //echo "$timezone <br/>";
    date_default_timezone_set($timezone);
        
   //sunrise time
    $risetime = $weatherdata['daily']['data'][0]['sunriseTime'];  
    $daytime = date('h:i',$risetime);
    $daytime  .= " AM"; 
    //echo $daytime;
    
    // sunset time
    $settime = $weatherdata['daily']['data'][0]['sunsetTime'];  
    $nighttime = date('h:i',$settime);
    $nighttime .= " PM"; 
    //echo $nighttime;
    

?>

</br></br>

<script type="text/javascript">

var street = document.getElementById("address");
var city = document.getElementById("city");
var state = document.getElementById("state");
var degree = document.getElementById("cel");    
var temp = "<?php echo $temp ?>";
    
street.setAttribute("value","<?php echo $street; ?>");
city.setAttribute("value","<?php echo $city; ?>");
state.value = "<?php echo $state;?>";

    
    
if( temp == "Celsius" ) {
    
    degree.setAttribute("checked","checked");
}
</script>


<div id="resultform">
    <h1 id="result"><?php echo $wcondition?><br/><?php echo $wtemperature?><br/>
<span class="heading"><img src="images/<?php echo $weathericon?>" title="<?php echo $weathermes ?>" </img></span>
</h1>    
<p id="text">Precipitation: <span class="text1"> <?php echo $wprecipitation ?> </span>
<br/>
    Chance of Rain: <span class="text2"> <?php echo $wrain ?></span> <br/>
    Wind Speed: <span class="text3"><?php echo $windspeed ?></span> <br/>
    Dew Point: <span class="text4"><?php echo $dewpoint ?></span> <br/>
    Humidity: <span class="text5"><?php echo $humidity ?></span> <br/>    
    Visibility: <span class="text5"><?php echo $visibility ?></span> <br/>
    Sunrise: <span class="text6"><?php echo $daytime ?></span> <br/>
    Sunset: <span class="text7"><?php echo $nighttime ?> </span>  
</p>    
</div>   
    


<noscript>
</body> 
</html>


