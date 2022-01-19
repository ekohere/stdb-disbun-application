@extends('layouts.app')
@section('content')
    <div class="content-body">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="bg-blue p-2 media-middle">
                                    <i class="fa fa-align-left font-large-2 text-white"></i>
                                </div>
                                <div class="media-body p-1">
                                    <span class="blue font-medium-5"> Map Testing for clear and clean</span><br>
                                    <span style="margin-top: -5px">Testing Map</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('adminlte-templates::common.errors')
                    <div class="card">
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="col-sm-12 align-items-center float-sm-none" id="div-loading"></div>

                                        <div class="card-content rounded-1 box-shadow-1 mt-3 p-0-1">
                                            <div name="mapPrev" id="mapPrev" style="height: 500px" class="m-0-1">
                                            </div>
                                        </div>
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

    <script>
        //init map and layer
        var newMap = L.map('mapPrev').setView([0.016373, 116.4330107], 7);
        var layerGroup =new L.LayerGroup();

        //set title to map
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '<i>Sumber Data: Pemerintah Kabupaten Kutai Timur</i>'
        }).addTo(newMap);
        layerGroup.addTo(newMap);

        /*Legend specific*/
        var legend = L.control({ position: "bottomright" });
        legend.onAdd = function(map) {
            var div = L.DomUtil.create("div", "legend");
            div.innerHTML += "<h5 class='text-left'>Keterangan:</h5>";
            div.innerHTML += '<i style="background: #5ded8c"></i><span class="small">RTRW Perkebunan Kutim</span><br>';
            div.innerHTML += '<i style="background: #ed6a6d"></i><span class="small">Area persil diluar kawasan peruntukan perkebunan</span><br>';
            div.innerHTML += '<i style="background: #87c1e6"></i><span class="small">Area persil</span><br>';
            return div;
        };
        legend.addTo(newMap);

        //TODO call polygon RTRW
        function callPolygonRTRWPerkebunan() {
            $.ajax({url:'{{env('APP_URL').'/api/rtrw_perkebunan'}}',
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygonPerkebunan(response);
                    }else {
                        alert("Data Persil Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }

        //TODO call Clean AND Clear
        function callCleanClear() {
            $.ajax({url:'http://localhost:8000/api/testing_clear_clean',
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygon(response);
                    }else {
                        alert("Data Persil Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }
        //TODO Draw Polygon rtrwPerkebunan After Call
        function drawPolygonPerkebunan(poly){
            datalayer = L.geoJson(poly.features,{
                style: {
                    color : '#5ded8c',
                    weight:3,
                    opacity:0.65

                },
                onEachFeature: function(feature, featureLayer) {
                    featureLayer.bindPopup(
                        "Peta: "+feature.properties.peta+("<br>")+
                        "rtrwk_2032: "+feature.properties.rtrwk_2032+("<br>")+
                        "sk_554: "+feature.properties.sk_554+("<br>")+
                        "ekse_4: "+feature.properties.ekse_4+("<br>")+
                        "ekse_5: "+feature.properties.ekse_5+("<br>")+
                        "peruntukan: "+feature.properties.peruntuk_r+("<br>")+
                        "pola ruang: "+feature.properties.pola_ruang+("<br>")+
                        "outline: "+feature.properties.outline+("<br>")+
                        "perimeter: "+feature.properties.perimeter+("<br>")+
                        "area: "+feature.properties.area+("<br>")+
                        "acres: "+feature.properties.acres+("<br>")+
                        "hectares: "+feature.properties.hectares+("<br>")+
                        "kabupaten: "+feature.properties.kab+("<br>")
                    );
                }
            });
            layerGroup.addLayer(datalayer);
            newMap.fitBounds(datalayer.getBounds());
            $("#div-loading").hide();
            $("#pre-loader").hide();
        }

        //TODO Draw Polygon After Call
        function drawPolygon(poly){
            datalayer = L.geoJson(poly.features,{
                style: {
                    color : '#ed6a6d',
                    weight:3,
                    opacity:0.65

                },
                onEachFeature: function(feature, featureLayer) {
                    // var luas = feature.properties.area;
                    // console.log(feature.properties.area);
                    // featureLayer.bindPopup(
                    //     "Nama Pemilik: "+feature.properties.nama_peta+("<br>")+
                    //     "No. Petak Persil: "+feature.properties.no_petak_peta+("<br>")+
                    //     "Jenis Tanaman: "+feature.properties.jenis_tanaman+("<br>")+
                    //     "Luas: "+luas.toFixed(2)+" Ha"+("<br>")+
                    //     "Status Lahan: "+feature.properties.status_lahan+("<br>")+
                    //     "Total Produksi/Tahun:"+feature.properties.total_produksi_setahun
                    // );
                }
            });
            layerGroup.addLayer(datalayer);
            newMap.fitBounds(datalayer.getBounds());
            $("#div-loading").hide();
            $("#pre-loader").hide();
        }

        //TODO Clear Maps
        // function clearMaps() {
        //     layerGroup.clearLayers();
        //     $("#cb-id-def").prop('checked',false);
        //     $("#cb-id-deg").prop('checked',false);
        //     $("#cb-id-peat").prop('checked',false);
        //     $("#cb-id-fire").prop('checked',false);
        //     $("#cb-id-smg").prop('checked',false);
        // }
        $(document).ready(function() {
            callPolygonRTRWPerkebunan();
            callCleanClear();
        });
    </script>

@endsection
