<!-- Sudah di modifikasi -->
@include('s_t_d_b_registers.show_detail_pengajuan')

<div class="card-content rounded-1 box-shadow-1 mt-3 p-0-1">
    <div name="mapPrev" id="mapPrev" style="height: 500px" class="m-0-1">
    </div>
</div>
<div class="border-top-green border-bottom-green border-top-3 bet border-bottom-3 card-content rounded-1 box-shadow-1 mt-3 p-0-1">
    <div class="p-2">
        <div class="form-group">
            <div class="card rounded-1 bg-light-green bg-lighten-3 box-shadow-1">
                <div class="card-body">
                    <div class="font-small-4 text-bold-500 brown darken-4">
                        <i class="fa fa-info-circle font-medium-4"></i><br>
                        Silahkan klik <b>CEK OVERLAY PERSIL</b> untuk melihat hasil rekomendasi dari sistem dan melakukan pengecekan layer setiap persil terhadap <b>layer RTRW</b>.<br>
                        Jika ingin melakukan pengecekan diluar sistem, silahkan download shp setiap persil terlebih dahulu dengan cara klik tombol
                        <code class="badge bg-green small white">Download shp persil <i class="fa fa-download"></i></code> di setiap persil yang tersedia.<br>
                        Dan ketika ingin melakukan verifikasi silahkan klik button <code>Verifikasi</code>

                    </div>
                </div>
            </div>
        </div>
        <span class="float-right"> <input class="ml-0-1" type="checkbox" id="persil-out" onclick="callCleanAndClear(this)"> <label class="text-uppercase text-bold-700"> Cek Overlay Persil</label></span>
        <h3 class="font-weight-bold mb-1">Status Persil</h3>
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            <h6>Persil {{$key+1}}:
                @if(!empty($item->persil->shp_polygon))
                    <span class="badge bg-green small"><a class="text-white" href="{{asset($item->persil->shp_polygon)}}">Download shp persil</a> <i class="fa fa-download"></i></span>
                @else
                    <span class="badge bg-warning small text-white">shp persil masih dalam proses konversi <i class="fa fa-refresh"></i></span>
                @endif
            </h6>
            <p class="small text-bold-700 mb-0">RTRW: <span class="badge bg-blue bg-lighten-2 mb-0-1" id="status-rtrw-{!! $item->persil->polygon_persil_id !!}">-</span></p>
            <hr>
        @endforeach
        @if($sTDBRegister->verified_by_ppr==0)
            <a href="{!! route('sTDBRegisters.verify', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-blue">Verifikasi</a>
        @endif
    </div>
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
    var layerRTRW =new L.LayerGroup().addTo(newMap);
    var layerAPL =new L.LayerGroup().addTo(newMap);
    var layerPersil =new L.LayerGroup().addTo(newMap);
    var layerCCRTRW =new L.LayerGroup();

    var baseMaps = {
        "Grayscale": baseTile,
        "Satellite": esriTile,
        "Terrain": googleTerrain
    };
    var overlayMaps = {
        "RTRW": layerRTRW,
        "Persil": layerPersil,
        "CC RTRW": layerCCRTRW

    };

    var tipeLayer =L.control.layers(baseMaps,overlayMaps).addTo(newMap);

    // layerGroup.addTo(newMap);
    /*Legend specific*/
    var legend = L.control({ position: "bottomright" });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h5 class='text-left'>Keterangan:</h5>";
        div.innerHTML += '<i style="background: #5ded8c"></i><span class="small">RTRW Perkebunan Kutim</span><br>';
        div.innerHTML += '<i style="background: #87c1e6"></i><span class="small">Area persil</span><br>';
        div.innerHTML += '<i style="background: #ed6a6d"></i><span class="small">Area persil diluar rtrw</span><br>';
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
        datalayer._leaflet_id = 2;
        layerRTRW.addLayer(datalayer);
        //newMap.fitBounds(datalayer.getBounds());
    }

    //TODO call Polygon Persil
    function callPolygonPersilByID(PolygonPersilID) {
        console.info(PolygonPersilID);
        $.ajax({url:'{{env('APP_URL').'/api/get_polygon_persil/'}}'+PolygonPersilID,
            success: function (response) {
                if (Array.isArray(response.features) && response.features.length){
                    drawPolygonPersil(response,PolygonPersilID);
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
    function drawPolygonPersil(poly,id){
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
        datalayer._leaflet_id = 800+id;
        layerPersil.addLayer(datalayer);
        newMap.fitBounds(datalayer.getBounds());
    }

    //TODO call Polygon CC RTRW
    function callPolygonCCRTRW(PolygonPersilID,elementCB) {
        if (elementCB.checked){
            $.ajax({url:'{{env('APP_URL').'/api/get_polygon_clean_rtrw/'}}'+PolygonPersilID,
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygonDifferenceRTRW(response,PolygonPersilID);
                    }else {
                        alert("Data Persil Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }else{
            if (layerCCRTRW.hasLayer(900+PolygonPersilID)){
                layerCCRTRW.removeLayer(900+PolygonPersilID);
            }
        }
    }
    //TODO Draw Polygon CC RTRW
    function drawPolygonDifferenceRTRW(poly,id){
        if (poly.features[0].properties.status==="Proses CC RTRW"){
            alert("Data persil masih dalam proses clean and clear, silahkan cek beberapa saat lagi");
        }else if(poly.features[0].geometry==null){
            document.getElementById("status-rtrw-"+id).textContent = "Clear and Clean";
            // alert("Data persil masih dalam proses clean and clear, silahkan cek beberapa saat lagi");
        }
        else if(poly.features[0].geometry.type==="GeometryCollection"){
            if(poly.features[0].geometry.geometries.length===0){
                document.getElementById("status-rtrw-"+id).textContent = "Clear and Clean";
            }
        }else{
            if(poly.features[0].geometry.coordinates.length===0){
                document.getElementById("status-rtrw-"+id).textContent = "Clear and Clean";
            }else{
                document.getElementById("status-rtrw-"+id).textContent = "ada sebagian area persil diluar dari RTRW: "+poly.features[0].properties.area+" Ha";
                document.getElementById("status-rtrw-"+id).className = "badge bg-danger bg-lighten-2 mb-0-1";

                datalayer = L.geoJson(poly.features,{
                    style: {
                        color : '#ed6a6d',
                        weight:3
                    },
                    onEachFeature: function(feature, featureLayer) {
                        featureLayer.bindPopup(
                            "Luas diluar RTRW: "+feature.properties.area+" Ha"+("<br>")
                        );
                    }
                });
                datalayer._leaflet_id = 900+id;
                layerCCRTRW.addLayer(datalayer).addTo(newMap);
                newMap.fitBounds(datalayer.getBounds());
            }

        }
    }

    function callCleanAndClear(elementCB) {
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            var id = parseInt({!! $item->persil->polygon_persil_id !!});
            callPolygonCCRTRW(id,elementCB);
        @endforeach
    }

    $(document).ready(function() {
        callPolygonRTRWPerkebunan();
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
        callPolygonPersilByID({!! $item->persil->polygon_persil_id !!});
        @endforeach
    });

</script>
