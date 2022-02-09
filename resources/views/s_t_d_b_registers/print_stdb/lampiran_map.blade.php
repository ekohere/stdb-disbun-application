@foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
    <div class="page" id="lampiran-map">
        <svg height="10" width="100%">
            <line x1="100%" y1="0" style="stroke:rgb(0,0,0);stroke-width:10"></line>
        </svg>
        <div class="mt-0 col-12 border-2 border-black">
            <img class="mt-1" src="{{asset('image/logo.png')}}" width="64px"/>
            <h6 class="m-0 p-0 text-uppercase default-font text-bold-700">Peta Lahan</h6>
            <h6 class="m-0 p-0 text-uppercase default-font text-bold-700">Desa {{$sTDBRegister->anggota->alamat_desa_ktp}}</h6>
            <h6 class="m-0 p-0 text-uppercase default-font text-bold-700">Kecamatan {{$sTDBRegister->anggota->alamat_kec_ktp}}</h6>
            <h6 class="m-0 p-0 text-uppercase default-font text-bold-700">Kabupaten Kutai Timur</h6>
            <h6 class="m-0 p-0 text-uppercase default-font text-bold-700">Tahun {{date_format($sTDBRegister->latest_status->pivot->created_at,'Y')}}</h6>
        </div>

        <div class="col-12 border-2 border-black p-0-1 text-center m-0 justify-content-center align-content-center center" >
            <div class="text-center center m-0" name="mapPrev-{{$item->persil->polygon_persil_id}}" id="mapPrev-{{$item->persil->polygon_persil_id}}" style="height:500px;" >
            </div>
        </div>

        <div class="mt-0 col-12 border-2 border-black text-left">
            <div class="row">
                <div class="col-2">
                    {{--                    <h6 class="mt-1 p-0 text-uppercase default-font text-bold-700">Legenda</h6>--}}
                    <div class="mb-1 p-0">
                        <img class="mt-1" src="{{asset('image/compass.png')}}" width="64px"/>
                    </div>
                </div>
                <div class="col-5">
                    <h6 class="mt-1 p-0 text-uppercase default-font text-bold-700">Legenda</h6>
                    <div class="m-0 p-0">
                        <i class="text-bold-700 fa fa-box bg-grey font-medium-2">▢</i><span> : Lahan Persil</span>
                    </div>
                </div>

                <div class="col-5">
                    <h6 class="mt-1 p-0 text-uppercase default-font text-bold-700">Koordinat</h6>
                    <div class="m-0 p-0">X:&nbsp;{{$item->persil->center_point->x}} &nbsp;&nbsp;&nbsp;&nbsp; Y:&nbsp;{{$item->persil->center_point->y}}</div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

<script>
    //TODO call Polygon Persil
    function callPolygonPersilByID(PolygonPersilID) {
        var newMap = L.map('mapPrev-'+PolygonPersilID,{
            zoomControl: false
        }).setView([0.016373, 116.4330107], 7);
        var baseTile = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '<i>Sumber Data: Pemerintah Kabupaten Kutai Timur</i>'
        }).addTo(newMap);
        var scale = L.control.scale().addTo(newMap);
        var layerPersil =new L.LayerGroup().addTo(newMap);

        $.ajax({url:'{{env('APP_URL').'/api/get_polygon_persil/'}}'+PolygonPersilID,
            success: function (response) {
                if (Array.isArray(response.features) && response.features.length){
                    drawPolygonPersilBYID(response,newMap,layerPersil);
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
    function drawPolygonPersilBYID(poly,map,layerPersil){
        datalayer = L.geoJson(poly.features,{
            style: {
                color : '#303030',
                weight:3
            },
            onEachFeature: function(feature, featureLayer) {
                var label = L.marker(featureLayer.getBounds().getCenter(), {
                    icon: L.divIcon({
                        className: 'label',
                        html: feature.properties.nama_peta+" ("+feature.properties.luas_lahan+" Ha)",
                        iconSize: [100, 40]
                    })
                }).addTo(map);
                featureLayer.bindPopup(
                    "Nama Pemilik: "+feature.properties.nama_peta+("<br>")+
                    "No. Petak Persil: "+feature.properties.no_petak_peta+("<br>")+
                    "Jenis Tanaman: "+feature.properties.jenis_tanaman+("<br>")+
                    "Luas: "+feature.properties.luas_lahan+" Ha"+("<br>")+
                    "Status Lahan: "+feature.properties.status_lahan+("<br>")+
                    "Total Produksi/Tahun:"+feature.properties.total_produksi_setahun
                );
            }
        });
        layerPersil.addLayer(datalayer);
        map.fitBounds(datalayer.getBounds());
    }

    $(document).ready(function() {
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            callPolygonPersilByID({!! $item->persil->polygon_persil_id !!});
        @endforeach
        var delayInMilliseconds = 1500; //1.5 second
        setTimeout(function() {
            window.print();
        }, delayInMilliseconds);
    });
</script>
