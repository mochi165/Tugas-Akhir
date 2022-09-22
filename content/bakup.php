    <link rel="stylesheet" href="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="<?php echo $s-> URL(); ?>/assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
    <script src="<?php echo $s->URL(); ?>/assets/js/Leaflet.heat-gh-pages/dist/leaflet-heat.js"></script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Peta</h6>
                        
                    </div>
                    <div class="card-body">
                        <style>
                        #map { top: 0; bottom: 0; left: 0; right: 0; height: 500px; }
                    </style>
                        <div id="map"></div>
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
                            var myIcon = L.icon({
                                iconUrl: '<?php echo $s ->URL(); ?>/assets/image/marker2.png',
                                iconSize: [30, 37],
                            });
                            <?php
                            $dataa = $s -> select("dataevakuasi");
                            foreach ($dataa as $rowe){
                            ?>
                             L.marker([<?php echo $rowe['lat'];?>,<?php echo $rowe['lng'];?>],{icon: myIcon}).addTo(myMap)
                                .bindPopup("Tujuan : <?php echo $rowe['namaTempat'];?> <br>,"+
                                            "<button class='btn btn-info' onclick='return keSini(<?php echo $rowe['lat'];?>,<?php echo $rowe['lng'];?>)'>Ke Sini</button>");

                            <?php } ; ?>

                        // Rute 
                        var control = L.Routing.control({
                            waypoints: [
                                L.latLng(-6.4692761,106.7852763)
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

                        function keSini(lat,lng){
                            var latLng=L.latLng(lat, lng);
                            control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
                        }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->  
</div>
<!-- End of Main Content -->



 
<br/>

        <?php
            if (isset($_GET["idTempat"])) {
                 $id = $_GET['idTempat'];
                $select=$s -> select("dataevakuasi 
                                        inner join datakecamatan on datakecamatan.kodeKecamatan=dataevakuasi.kodeKecamatan where idTempat='$id'");
                $lis=$s -> arr($select);
             }  else {
                echo " ";
             }
            
         ?>
         <?php 
            if (isset($lis)) {
              echo $lis['namaTempat'];

            } else {
                echo " ";
            }  
         ?>
          <button class='btn btn-info' onclick='return keSini(<?php echo $lis['lat'];?>,<?php echo $lis['lng'];?>)'>Tampilkan Rute</button>