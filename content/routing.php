    <link rel="stylesheet" href="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/js/Leaflet.heat-gh-pages/dist/leaflet-heat.js"></script>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4" >
            <div class="col-lg" >
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tujuan</h6>
                        <?php
                            if (isset($_GET["idTempat"])) {
                                $id = $_GET['idTempat'];
                                $sql3 = $s -> select ("dataevakuasi WHERE idTempat = '$id' ");
                                $dt3 = $s -> arr($sql3);
                            } else {
                                echo " ";
                            } 
                        ?>
                        <input type="text" name=""  value="<?php if (isset($_GET["idTempat"])) { echo $dt3['namaTempat'];}else{ echo "Pilih Tujuan dulu";} ?>" readonly>
                        <input type="text" name="" value="<?php if (isset($_GET["idTempat"])) { echo $dt3['alamat'];}else{ echo "Pilih Tujuan dulu ";} ?>" readonly >

                        <button class='btn btn-info' onclick='return keSini(<?php echo $dt3['lat'];?>,<?php echo $dt3['lng'];?>)'>Tampilkan Rute</button>

                    </div>
                    <div class="card-body">
                        <style>
                            #map { top: 0; bottom: 0; left: 0; right: 0; height: 600px; }
                        </style>
                        
                        <div id="map"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->  
</div>
<!-- End of Main Content -->

<script>
var myMap = L.map('map').setView([-6.5446033,106.7282213], 11);
var myLayer=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution :'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(myMap);
function popUp(f,l){
    var out = [];
    if (f.properties){
        out.push("Kecamatan :"+f.properties["Kecamatan"]);
        l.bindPopup(out.join("<br />"));
    }
}
myMap.addLayer(myLayer);

//Heat Bencana
<?php
$dataa = $s -> select("databencana 
    left join datakecamatan on datakecamatan.kodeKecamatan=databencana.kodeKecamatan
         ");
$heatmapArray=array();
foreach ($dataa as $rowe){
    $heatmapArray[]="[".$rowe['lat'].",".$rowe['longi'].", 40]";
}
$heatmapData=implode(',', $heatmapArray);
?>
var heat = L.heatLayer([
    <?php echo $heatmapData; ?>
], {radius:40}).addTo(myMap);

//marker Evakusais
// var myIcon = L.icon({
//     iconUrl: '<?php echo $s ->URL(); ?>/assets/image/marker2.png',
//     iconSize: [30, 37],
// });
<?php
$dataa = $s -> select("dataevakuasi");
foreach ($dataa as $rowe){
?>
 // L.marker([<?php echo $rowe['lat'];?>,<?php echo $rowe['lng'];?>],{icon: myIcon}).addTo(myMap)
 //    .bindPopup("Tujuan : <?php echo $rowe['namaTempat'];?> <br>,"+
 //                "<button class='btn btn-info' onclick='return keSini(<?php echo $rowe['lat'];?>,<?php echo $rowe['lng'];?>)'>Ke Sini</button>");

<?php } ; ?>

// gps
getLocation();
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      $("[name=latLng]").val(position.coords.latitude).val(position.coords.longitude);
    }


// Rute 
    var control = L.Routing.control({
        waypoints: [
        L.latLng(-6.5996906,106.8117823)
        ],
        geocoder: L.Control.Geocoder.nominatim(),
        routeWhileDragging: true,
        reverseWaypoints: true,
        showAlternatives: true,
        altLineOptions: {
            styles: [
                {color: 'black', opacity: 0.15, weight: 9},
                {color: 'white', opacity: 0.8, weight: 6},
                {color: 'blue', opacity: 0.5, weight: 2}
            ]
        }
    })
    control.addTo(myMap);

    function dariSini(lat,lng){
        var latLng=L.latLng(lat, lng);
        control.spliceWaypoints(control.getWaypoints().length - 2, 2, latLng);
    }
    function keSini(lat,lng){
        var latLng=L.latLng(lat, lng);
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
    }
    
// gps
// function onLocationFound(e) {
//     var radius = e.accuracy / 1;

//     var locationMarker = L.marker(e.latlng).addTo(myMap)
//         .bindPopup('You are within ' + radius + ' meters from this point').openPopup();

//     var locationCircle = L.circle(e.latlng, radius).addTo(myMap);
// }

// function onLocationError(e) {
//     alert(e.message);
// }

// myMap.on('locationfound', onLocationFound);
// myMap.on('locationerror', onLocationError);

// myMap.locate({setView: true, maxZoom: 19});
</script>