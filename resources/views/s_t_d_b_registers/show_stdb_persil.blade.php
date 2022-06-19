@extends('layouts.app')
@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <a href="{!! route('home') !!}" class="btn btn-icon danger btn-lg pl-0 ml-0"><i class="ft-arrow-left"></i> Kembali</a>
                                        </h4>
                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('admin_disbun') || \Illuminate\Support\Facades\Auth::user()->hasRole('BPN') || \Illuminate\Support\Facades\Auth::user()->hasRole('PPR') || \Illuminate\Support\Facades\Auth::user()->hasRole('KPH'))
                                            <div class="card-content rounded-1 box-shadow-1 mt-3 p-0-1">
                                                <div name="mapPrev" id="mapPrev" style="height: 500px" class="m-0-1">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

    <script>
        //set title to map
        var newMap = L.map('mapPrev').setView([0.016373, 116.4330107], 7);
        var esriTile = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: '<i>Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community</i>'
        });
        var baseTile = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '<i>Sumber Data: Pemerintah Kabupaten Kutai Timur</i>'
        }).addTo(newMap);

        var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',
            {
                subdomains:['mt0','mt1','mt2','mt3']
            });

        //init map and layer
        var layerPersil =new L.LayerGroup().addTo(newMap);

        var baseMaps = {
            "Grayscale": baseTile,
            "Satellite": esriTile,
            "Terrain": googleTerrain
        };
        var overlayMaps = {
            "Persil": layerPersil
        };

        var tipeLayer =L.control.layers(baseMaps,overlayMaps).addTo(newMap);
        /*Legend specific*/
        var legend = L.control({ position: "bottomright" });
        legend.onAdd = function(map) {
            var div = L.DomUtil.create("div", "legend");
            div.innerHTML += "<h5 class='text-left'>Keterangan:</h5>";
            div.innerHTML += '<i style="background: #87c1e6"></i><span class="small">Area persil</span><br>';
            return div;
        };
        legend.addTo(newMap);

        //TODO call Polygon Persil
        function callAllPolygonPersil() {
            $.ajax({url:'{{env('APP_URL').'/api/all_polygon_persil.geojson'}}',
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygonPersil(response);
                    }else {
                        alert("Data Persil Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }
        //TODO Draw Polygon Persil After Call
        function drawPolygonPersil(poly){
            datalayer = L.geoJson(poly.features,{
                style: {
                    color : '#6495ED',
                    weight:3
                },
                onEachFeature: function(feature, featureLayer) {
                    var luas = feature.properties.area;
                    featureLayer.bindPopup(
                        "Nama Pemilik: "+feature.properties.nama_peta+("<br>")+
                        "No. Petak Persil: "+feature.properties.no_petak_peta+("<br>")+
                        "Jenis Tanaman: "+feature.properties.jenis_tanaman+("<br>")+
                        "Luas: "+feature.properties.area+" Ha"+("<br>")+
                        "Status Lahan: "+feature.properties.status_lahan+("<br>")+
                        "Total Produksi/Tahun:"+feature.properties.total_produksi_setahun
                    );
                }
            });
            layerPersil.addLayer(datalayer);
            newMap.fitBounds(datalayer.getBounds());
        }

        $(document).ready(function() {
            callAllPolygonPersil();
        });

    </script>
@endsection
