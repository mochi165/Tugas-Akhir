    <!-- Begin Page Content -->
    <div class="container-fluid">

        <script src="<?php echo $s->URL(); ?>/assets/js/Leaflet.heat-gh-pages/dist/leaflet-heat.js"></script>
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Heatmap Peta Bencana</h6>
                    </div>
                    
                    <div class="card-body">
                        <style>
                        #map { position: ; top: 0; bottom: 0; left: 0; right: 0; height: 500px; }
                    </style>
                        <div id="map"></div>
                        <script>
                            var myMap = L.map('map').setView([-6.5431136,106.8730544], 11);
                            var myLayer=L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=z3193k6WZVm52r4TMHoX', {
                                attribution :'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
                            }).addTo(myMap);

                            function popUp(f,l){
                                var out = [];
                                if (f.properties){
                                    out.push("Kecamatan :"+f.properties["Kecamatan"]);
                                    l.bindPopup(out.join("<br />"));
                                }
                            }
                           
                            myMap.addLayer(myLayer);

                            function iconByName(name) {
                                // return '<i class="icon icon-'+name+'"></i>';
                                return '<i class="fas fa-circle" style="color:'+name+';"></i>';
                            }

                            function featureToMarker(feature, latlng) {
                                return L.marker(latlng, {
                                    icon: L.divIcon({
                                        className: 'marker-'+feature.properties.amenity,
                                        html: iconByName(feature.properties.amenity),
                                        iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
                                        iconSize: [25, 41],
                                        iconAnchor: [12, 41],
                                        popupAnchor: [1, -34],
                                        shadowSize: [41, 41]
                                    })
                                });
                            }

                            var baseLayers = [
                                {
                                    name: "OpenStreetMap",
                                    layer: myLayer
                                },
                                {
                                    name: "Outdoors",
                                    layer: L.tileLayer('https://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
                                }
                            ];

                            <?php 
                            $data = $s -> select("datakecamatan ORDER BY idKecamatan ASC"); 
                            foreach ($data as $row){
                            ?>
                                var myStyle<?php echo $row['idKecamatan'];?> = {
                                    "color": "<?php echo $row['warnaKecamatan'];?>",
                                    "weight": 1,
                                    "opacity": 1
                                };

                                <?php
                                    $arrayKec[]='{
                                    name: "'.$row['namaKecamatan'].'",
                                    icon: iconByName("'.$row['warnaKecamatan'].'"),
                                    layer: new L.GeoJSON.AJAX(["'.$s->URL().'/assets/geojson/'.$row['geojsonKecamatan'].'"],{onEachFeature:popUp,style: myStyle'.$row['idKecamatan'].',pointToLayer: featureToMarker }).addTo(myMap)
                                    }';
                                }?>
                            var overLayers = [{
                                group: "Layer Kecamatan",
                                layers: [
                                    <?=implode(',', $arrayKec);?>
                                ]
                            }
                            ];
                            var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);
                            myMap.addControl(panelLayers);

                        // Heatmap
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
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->