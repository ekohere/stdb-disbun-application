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
                        {{--Silahkan klik <b>CEK OVERLAY PERSIL</b> untuk melihat hasil rekomendasi dari sistem dan melakukan pengecekan layer setiap persil terhadap <b>layer RTRW</b>.<br>--}}
                        Jika ingin melakukan pengecekan diluar sistem, silahkan download shp setiap persil terlebih dahulu dengan cara klik tombol
                        <code class="badge bg-green small white">Download shp persil <i class="fa fa-download"></i></code> di setiap persil yang tersedia.<br>
                        Dan ketika ingin melakukan verifikasi silahkan klik button <code>Verifikasi</code>

                    </div>
                </div>
            </div>
        </div>
        {{--<span class="float-right"> <input class="ml-0-1" type="checkbox" id="persil-out" onclick="callCleanAndClear(this)"> <label class="text-uppercase text-bold-700"> Cek Overlay Persil</label></span>--}}
        <h3 class="font-weight-bold mb-1">Status Persil</h3>
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            <h6>Persil {{$key+1}}:
                @if(!empty($item->persil->shp_polygon))
                    <span class="badge bg-green small"><a class="text-white" href="{{asset($item->persil->shp_polygon)}}">Download shp persil</a> <i class="fa fa-download"></i></span>
                @else
                    <span class="badge bg-warning small text-white">shp persil masih dalam proses konversi <i class="fa fa-refresh"></i></span>
                @endif
            </h6>
            <hr>
        @endforeach
        @if($sTDBRegister->latest_status->id!=2 && $sTDBRegister->latest_status->id!=3 && $sTDBRegister->latest_status->id!=6)
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

    // layerGroup.addTo(newMap);
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

    $(document).ready(function() {
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
        callPolygonPersilByID({!! $item->persil->polygon_persil_id !!});
        @endforeach
    });

</script>
