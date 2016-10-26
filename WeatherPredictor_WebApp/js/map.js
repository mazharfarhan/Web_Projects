!-- script for creating the map tile -->
<script src="http://openlayers.org/api/OpenLayers.js"></script>
<script>
    var lanlat = new OpenLayers.LonLat("44.98767", "45.7657");
    var map = OpenLayers.Map("basicMap");
    
    
    var layer_cloud = new OpenLayers.Layer.XYZ(
        "clouds",
        "http://${s}.tile.openweathermap.org/map/clouds/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );

    var layer_precipitation = new OpenLayers.Layer.XYZ(
        "precipitation",
        "http://${s}.tile.openweathermap.org/map/precipitation/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );

    map.addLayers([mapnik, layer_precipitation, layer_cloud]);
    
    console.log(map);
    
</script>
