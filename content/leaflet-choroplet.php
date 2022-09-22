    <!-- Begin Page Content -->
    <div class="container-fluid">

        <link rel="stylesheet" href="<?php echo $s->URL(); ?>/assets/js/leaflet.markercluster-master/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="<?php echo $s->URL(); ?>/assets/js/leaflet.markercluster-master/dist/MarkerCluster.Default.css" />
        <script src="<?php echo $s->URL(); ?>/assets/js/leaflet.markercluster-master/dist/leaflet.markercluster-src.js"></script>
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Choroplet</h6>
                    </div>
                    <div class="card-body">
                        <style>
                        #map { position: ; top: 0; bottom: 0; left: 0; right: 0; height: 500px; }
                        .info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
                        .legend { text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }
                    </style>
                        <div id="map"></div>
                        <script type="text/javascript">
                            <?php
                                $getKecamatan = $s -> select("datakecamatan ");
                                foreach ($getKecamatan as $row) {
                                    $da = $row['kodeKecamatan'];
                                    $we = $s -> select("databencana where kodeKecamatan = '$da'");
                                    $sa= $s->qRows($we);
                                    $data[$row['kodeKecamatan']]=$sa;
                                }
                            ?>
                            var BENCANA = <?=json_encode($data)?>;

                            var myMap = L.map('map').setView([-6.5538016,106.8113743], 10.50);
                            var myLayer=L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=z3193k6WZVm52r4TMHoX', {
                                attribution :'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
                            }).addTo(myMap);

                            myMap.addLayer(myLayer);

                            // // control that shows state info on hover
                            var info = L.control();

                            info.onAdd = function (map) {
                                this._div = L.DomUtil.create('div', 'info');
                                this.update();
                                return this._div;
                            };

                            info.update = function (props) {
                                this._div.innerHTML = '<h4>Total Bencana di Kabupaten Bogor</h4>' +  (props ?
                                    '<b>' + "Di &nbsp;" + props.Kecamatan + '</b><br />' + BENCANA[props.KODE] + ' Bencana'
                                    : 'Dekatkan mouse untuk melihat');
                            };

                            info.addTo(myMap);
                            // info panel

                            // LEGEND
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

                            // feature
                            function getColor(d) {
                                return  d > 50  ? '#993718' :
                                        d > 30  ? '#EF5562' :
                                        d > 15  ? '#ff8040' :
                                        d > 5   ? '#FFCF5A' :
                                                  '#6AED72' ;
                            }

                            function style(feature) {
                                return {
                                    weight: 2,
                                    opacity: 1,
                                    color: 'white',
                                    dashArray: '3',
                                    fillOpacity: 0.7,
                                    fillColor: getColor(BENCANA[feature.properties.KODE])
                                };
                            }

                            var legend = L.control({position: 'bottomright'});

                            legend.onAdd = function (map) {

                                var div = L.DomUtil.create('div', 'info legend'),
                                    grades = [0, 5, 15, 30, 50],
                                    labels = [],
                                    from, to;

                                for (var i = 0; i < grades.length; i++) {
                                    from = grades[i];
                                    to = grades[i + 1];

                                    labels.push(
                                        '<i style="background:' + getColor(from + 1) + '"></i> ' +
                                        from + (to ? '&ndash;' + to : '+'));
                                }

                                div.innerHTML = labels.join('<br>');
                                return div;
                            };

                            legend.addTo(myMap);

                            function highlightFeature(e) {
                                var layer = e.target;

                                layer.setStyle({
                                    weight: 5,
                                    color: '#666',
                                    dashArray: '',
                                    fillOpacity: 0.7
                                });

                                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                                    layer.bringToFront();
                                }

                                info.update(layer.feature.properties);
                            }

                            function resetHighlight(e) {
                                var layer = e.target;

                                layer.setStyle({
                                    weight: 2,
                                    opacity: 1,
                                    color: 'white',
                                    dashArray: '3'
                                });

                                info.update();
                            }
                            
                            function zoomToFeature(e) {
                                myMap.fitBounds(e.target.getBounds());
                            }

                            function onEachFeature(feature, layer) {
                                layer.on({
                                    mouseover: highlightFeature,
                                    mouseout: resetHighlight,
                                    click: zoomToFeature
                                });
                            }

                            <?php 
                            $data = $s -> select("datakecamatan ORDER BY idKecamatan ASC"); 
                            foreach ($data as $row){
                            ?>
                                <?php
                                    $arrayKec[]='{
                                    name: "&nbsp;'.$row['namaKecamatan'].'&nbsp;",
                                    layer: new L.GeoJSON.AJAX(["'.$s->URL().'/assets/geojson/'.$row['geojsonKecamatan'].'"],{onEachFeature:onEachFeature,
                                        style: style
                                    }).addTo(myMap)
                                    }';
                                }?>


                            var overLayers = [{
                                group: "Layer Kecamatan",
                                layers: [
                                    <?=implode(',', $arrayKec);?>
                                ]
                            }
                            ];

                            var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
                                collapsibleGroups : true,
                                position : "bottomleft"
                            });

                            myMap.addControl(panelLayers);

                            // Marker
                            var markers = L.markerClusterGroup();

                            <?php
                            $dataa = $s -> select("databencana 
                                left join datakecamatan on datakecamatan.kodeKecamatan=databencana.kodeKecamatan
                                     ");
                              
                            foreach ($dataa as $rowe){
                            ?>
                            var marker = L.marker([<?php echo $rowe['lat'];?>, <?php echo $rowe['longi'];?>])
                             .bindPopup("Lokasi : <?php echo $rowe['lokasi'];?>, Kec.<?php echo $rowe['namaKecamatan'];?> <br>  Bencana : <?php echo $rowe['namaBencana'];?><br>Tanggal : <?php echo $rowe['waktu'];?>");
                            
                            markers.addLayer(marker);

                        <?php } ; ?>
                        myMap.addLayer(markers);

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->