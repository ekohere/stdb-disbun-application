<!-- Sudah di modifikasi -->

<div class="card-content rounded-1 box-shadow-1 mt-3 p-0-1">
    <div name="mapPrev" id="mapPrev" style="height: 500px" class="m-0-1">
{{--        <div class="col-sm-12 align-items-center float-sm-none" id="div-loading"></div>--}}
    </div>
</div>
<div class="border-top-green border-bottom-green border-top-3 bet border-bottom-3 card-content rounded-1 box-shadow-1 mt-3 p-0-1">
    <div class="p-2">
        <div class="form-group">
            <div class="card rounded-1 bg-light-green bg-lighten-3 box-shadow-1">
                <div class="card-body">
                    <div class="font-small-4 text-bold-500 brown darken-4">
                        <i class="fa fa-info-circle font-medium-4"></i><br>
                        Silahkan klik <b>CEK OVERLAY PERSIL</b> untuk melihat hasil rekomendasi dari sistem dan melakukan pengecekan layer setiap persil terhadap <b>layer Kawasan {{!empty(\Illuminate\Support\Facades\Auth::user()->kph->nama)?\Illuminate\Support\Facades\Auth::user()->kph->nama:"KPH"}}</b>.<br>
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
            <p class="small text-bold-700 mb-0">APL: <span class="badge bg-blue bg-lighten-2 mb-0-1" id="status-apl-{!! $item->persil->polygon_persil_id !!}">-</span></p>
            <p class="small text-bold-700 mb-0">Area Kawasan KPH: <span class="badge bg-blue bg-lighten-2 mb-0-1" id="status-kph-{!! $item->persil->polygon_persil_id !!}">-</span></p>
            <hr>
        @endforeach
        @if($sTDBRegister->verified_by_kph==0)
            <a href="{!! route('sTDBRegisters.verify', [$sTDBRegister->id]) !!}" class="btn btn-sm btn-blue">Verifikasi</a>
        @endif
    </div>
</div>
@include('s_t_d_b_registers.show_detail_pengajuan')

{{--<div class="card-content bg-gradient-striped-grey-blue rounded-1 box-shadow-1 mt-3 p-2">--}}
{{--    <span class="content-header-title mb-0 d-inline-block font-medium-4"><b>Detail Persil</b></span>--}}
{{--    <table class="table table-responsive table-hover table-bordered table-striped default">--}}
{{--        <colgroup>--}}
{{--            <col class="col-xs-1">--}}
{{--            <col class="col-xs-7">--}}
{{--        </colgroup>--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th><code>#</code></th>--}}
{{--            <th>Nama Pemilik</th>--}}
{{--            <th>Ket. Lahan</th>--}}
{{--            <th>Produksi Lahan</th>--}}
{{--            <th>Penjualan TBS</th>--}}
{{--            <th>Ket. Tanaman</th>--}}
{{--            <th>Kondisi Lahan</th>--}}
{{--            <th>Benih & Pupuk</th>--}}
{{--            <th>Biaya Produksi</th>--}}
{{--            <th>Kendala Pekebun</th>--}}
{{--            <th>Lahan Peremajaan</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @php--}}
{{--            $no = 1;--}}
{{--        @endphp--}}
{{--        @foreach($sTDBRegister->stdbDetailRegis as $sTDBPersil)--}}
{{--            @if(!empty($sTDBPersil->persil_id))--}}
{{--                <tr>--}}
{{--                    <td>{!! $no++ !!}</td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Nama: <b>{!! $sTDBPersil->persil->anggota->nama_ktp !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">No. KTP: <b>{!! $sTDBPersil->persil->anggota->nomor_ktp !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Tempat/Tgl lahir: <b>{!! $sTDBPersil->persil->anggota->tempat_lahir !!}, {!! date("d M Y", strtotime($sTDBPersil->persil->anggota->tgl_lahir)) !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Umur: <b>{!! Carbon\Carbon::now()->diffInYears(date("d M Y", strtotime($sTDBPersil->persil->anggota->tgl_lahir))) !!} Tahun</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Jenis Kelamin: <b>{!! $sTDBPersil->persil->anggota->jenis_kelamin !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Alamat: <b>{!! $sTDBPersil->persil->anggota->alamat_ktp !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Kecamatan/Desa: <b>{!! $sTDBPersil->persil->anggota->alamat_kec_ktp !!}/{!! $sTDBPersil->persil->anggota->alamat_desa_ktp !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Alamat: <b>{!! $sTDBPersil->persil->anggota->alamat_ktp !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Status Dalam Rumah Tangga: <b>{!! $sTDBPersil->persil->anggota->status_dlm_keluarga !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Jumlah Anggota Tangga: <b>{!! $sTDBPersil->persil->anggota->status_dlm_keluarga !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Pendidikan Terakhir: <b>{!! $sTDBPersil->persil->anggota->pendidikan_terakhir !!}</b></span><br>--}}
{{--                        <span class="badge bg-blue bg-darken-2 mb-0-1">Pekerjaan Lain: <b>{!! $sTDBPersil->persil->anggota->pekerjaan_lain !!}</b></span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">Status Lahan: {!! $sTDBPersil->persil->status_lahan !!}</span><br>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">No.Surat: {!! $sTDBPersil->persil->no_surat_lahan==null?"-":$sTDBPersil->persil->no_surat_lahan==null  !!}</span><br>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">Jenis Tanaman: {!! $sTDBPersil->persil->jenis_tanaman !!}</span><br>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">Luas ditanam telah produksi(m²): {!! $sTDBPersil->persil->luas_lahan_tanam_telah_produksi !!}</span><br>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">Luas ditanam belum produksi(m²): {!! $sTDBPersil->persil->luas_lahan_tanam_belum_produksi !!}</span><br>--}}
{{--                        <span class="badge bg-primary bg-darken-1 mb-0-1">Luas belum ditanam(m²): {!! $sTDBPersil->persil->luas_lahan_belum_tanam !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-success bg-darken-2 mb-0-1">Rata² Jumlah Panen/Bulan(kali): {!! $sTDBPersil->persil->rata_panen_bulan !!}</span><br>--}}
{{--                        <span class="badge bg-success bg-darken-2 mb-0-1">Rata² Jumlah Panen/Tahun(kali): {!! $sTDBPersil->persil->rata_panen_tahun !!}</span><br>--}}
{{--                        <span class="badge bg-success bg-darken-2 mb-0-1">Rata² Produksi/Panen(Ton): {!! $sTDBPersil->persil->rata_produksi_dalam_panen !!}</span><br>--}}
{{--                        <span class="badge bg-success bg-darken-2 mb-0-1">Rata² Produksi/Tahun(Ton): {!! $sTDBPersil->persil->total_produksi_setahun !!}</span><br>--}}
{{--                        <span class="badge bg-success bg-darken-2 mb-0-1">Produktifitas Lahan(Ton/Ha): {!! $sTDBPersil->persil->produktifitas_lahan !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-warning bg-darken-3 mb-0-1">Rata² Harga Jual(Rp/Kg): {!! $sTDBPersil->persil->rata_harga_jual_tbs !!}</span><br>--}}
{{--                        <span class="badge bg-warning bg-darken-3 mb-0-1">Total Penjualan/Tahun(Rp): {!! $sTDBPersil->persil->total_penjualan_tbs_tahun !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-green bg-darken-1 mb-0-1">Rata² Umur Tanaman: {!! $sTDBPersil->persil->rata_umur_tanaman !!}</span><br>--}}
{{--                        <span class="badge bg-green bg-darken-1 mb-0-1">Bulan&Tahun Tanam: {!! $sTDBPersil->persil->bulan_tanam !!} & {!! $sTDBPersil->persil->tahun_tanam !!}</span><br>--}}
{{--                        <span class="badge bg-green bg-darken-1 mb-0-1">Jumlah Pohon: {!! $sTDBPersil->persil->jml_pohon !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-info bg-darken-1 mb-0-1">Pola Tanam: {!! $sTDBPersil->persil->pola_tanam !!}</span><br>--}}
{{--                        <span class="badge bg-info bg-darken-1 mb-0-1">Jenis Lahan: {!! $sTDBPersil->persil->lahan_gambut_or_non !!}</span><br>--}}
{{--                        <span class="badge bg-info bg-darken-1 mb-0-1">Topografi: {!! $sTDBPersil->persil->topografi !!}</span><br>--}}
{{--                        <span class="badge bg-info bg-darken-1 mb-0-1">Metoda Bukaan Lahan: {!! $sTDBPersil->persil->metode_bukaan_lahan !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-pink bg-darken-2 mb-0-1">Asal Benih: {!! $sTDBPersil->persil->asal_benih !!}</span><br>--}}
{{--                        <span class="badge bg-pink bg-darken-2 mb-0-1">Jenis Pupuk: {!! $sTDBPersil->persil->jenis_pupuk !!}</span><br>--}}
{{--                        <span class="badge bg-pink bg-darken-2 mb-0-1">Mitra Pengolahan: {!! $sTDBPersil->persil->mitra_pengolahan !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Pupuk + Upah: Rp.{!! number_format($sTDBPersil->persil->pupuk_tambah_upah,0,',','.') !!}</span><br>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Pestisida + Upah: Rp.{!! number_format($sTDBPersil->persil->pestisida_tambah_upah,0,',','.') !!}</span><br>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Pembersihan Kebun + Upah: Rp.{!! number_format($sTDBPersil->persil->pembersihan_tambah_upah,0,',','.') !!}</span><br>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Panen + Upah: Rp.{!! number_format($sTDBPersil->persil->panen_tambah_upah,0,',','.') !!}</span><br>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Biaya Lain: Rp.{!! number_format($sTDBPersil->persil->biaya_lain,0,',','.') !!}</span><br>--}}
{{--                        <span class="badge bg-brown bg-lighten-1 mb-0-1">Total Biaya Produksi: Rp.{!! number_format($sTDBPersil->persil->total_biaya_produksi,0,',','.') !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-red bg-lighten-1 mb-0-1">Apakah Kesulitan Menjual Hasil Kebun: {!! $sTDBPersil->persil->apakah_kesulitan_menjual !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-1 mb-0-1">Apa Kesulitan Utama: {!! $sTDBPersil->persil->jenis_kesulitan !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-1 mb-0-1">Apa Kesulitan Lainnya: {!! $sTDBPersil->persil->kesulitan_lainnya !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-1 mb-0-1">Bagaimana Penentuan Harga Jual: {!! $sTDBPersil->persil->penentuan_harga_jual !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-1 mb-0-1">Bagaimana Penentuan Harga Jual: {!! $sTDBPersil->persil->penentuan_harga_jual !!}</span><br>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <span class="badge bg-red bg-lighten-3 mb-0-1">Lahan Yang Perlu Diremajakan: {!! $sTDBPersil->persil->lahan_yg_perlu_diremajakan !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-3 mb-0-1">Luas Lahan Yang Perlu Diremajakan(Ha): {!! $sTDBPersil->persil->luas_peremajaan !!}</span><br>--}}
{{--                        <span class="badge bg-red bg-lighten-3 mb-0-1">Bentuk Skema Peremajaan: {!! $sTDBPersil->persil->bentuk_skema_peremajaan !!}</span><br>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @elseif(!empty($sTDBPersil->stdb_persil_id))--}}
{{--                <tr>--}}
{{--                    <td>{!! $no++ !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->users->name !!}</td>--}}
{{--                    <td>--}}
{{--                        Status Lahan: {!! $sTDBPersil->stdbPersil->status_lahan !!}<br>--}}
{{--                        No.Surat: <span class="badge badge-blue">{!! $sTDBPersil->stdbPersil->no_surat_lahan==null?"-":$sTDBPersil->stdbPersil->no_surat_lahan==null !!}</span>--}}
{{--                    </td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->jenis_tanaman !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->luas_lahan_tanam_telah_produksi !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->luas_lahan_tanam_belum_produksi !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->luas_lahan_belum_tanam !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->rata_panen_bulan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->rata_panen_tahun !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->total_produksi_setahun !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->rata_produksi_dalam_panen !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->produktifitas_lahan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->rata_harga_jual_tbs !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->total_penjualan_tbs_tahun !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->rata_umur_tanaman !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->bulan_tanam !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->tahun_tanam !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->jml_pohon !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->pola_tanam !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->lahan_gambut_or_non !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->topografi !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->metode_bukaan_lahan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->asal_benih !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->jenis_pupuk !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->mitra_pengolahan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->pupuk_tambah_upah !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->pestisida_tambah_upah !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->pembersihan_tambah_upah !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->panen_tambah_upah !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->biaya_lain !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->total_biaya_produksi !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->apakah_kesulitan_menjual !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->jenis_kesulitan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->kesulitan_lainnya !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->penentuan_harga_jual !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->lahan_yg_perlu_diremajakan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->luas_peremajaan !!}</td>--}}
{{--                    <td>{!! $sTDBPersil->stdbPersil->bentuk_skema_peremajaan !!}</td>--}}
{{--                </tr>--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
{{--</div>--}}

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

<script>
    //set title to map
    var newMap = L.map('mapPrev').setView([0.016373, 116.4330107], 7);

    var baseTile = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '<i>Sumber Data: Pemerintah Kabupaten Kutai Timur</i>'
    }).addTo(newMap);
    var esriTile = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: '<i>Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community</i>'
    });

    var googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        subdomains:['mt0','mt1','mt2','mt3']
    });

    //init map and layer
    var layerKPH =new L.LayerGroup().addTo(newMap);
    var layerAPL =new L.LayerGroup().addTo(newMap);
    var layerPersil =new L.LayerGroup().addTo(newMap);
    var layerCCAPL =new L.LayerGroup();
    var layerCCKPH =new L.LayerGroup();

    var baseMaps = {
        "Grayscale": baseTile,
        "Satellite": esriTile,
        "Terrain": googleTerrain
    };
    var overlayMaps = {
        "KPH": layerKPH,
        "APL": layerAPL,
        "Persil": layerPersil,
        "CC APL": layerCCAPL,
        "CC KPH": layerCCKPH
    };

    var tipeLayer =L.control.layers(baseMaps,overlayMaps).addTo(newMap);

    /*Legend specific*/
    var legend = L.control({ position: "bottomright" });
    legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h5 class='text-left'>Keterangan:</h5>";
        div.innerHTML += '<i style="background: #5ded8c"></i><span class="small">Area Kawasan KPH</span><br>';
        div.innerHTML += '<i style="background: #ffdc00"></i><span class="small">APL Perkebunan</span><br>';
        div.innerHTML += '<i style="background: #87c1e6"></i><span class="small">Area persil</span><br>';
        div.innerHTML += '<i style="background: #ed43ed"></i><span class="small">Area persil diluar APL</span><br>';
        div.innerHTML += '<i style="background: #ff2500"></i><span class="small">Area persil diluar KPH</span><br>';
        return div;
    };
    legend.addTo(newMap);

    //TODO call polygon APL
    function callPolygonAPL() {
        $.ajax({url:'{{env('APP_URL').'/api/apl_perkebunan'}}',
            success: function (response) {
                if (Array.isArray(response.features) && response.features.length){
                    drawPolygonAPL(response);
                }else {
                    alert("Data Persil Kosong");
                }
            },
            error: function (xhr, status, error){
                alert("Error:"+error);
            }
        });
    }

    //TODO Draw Polygon APL After Call
    function drawPolygonAPL(poly){
        datalayer = L.geoJson(poly.features,{
            style: {
                color : '#ffdc00',
                weight:3,
                opacity:0.65

            },
            onEachFeature: function(feature, featureLayer) {
                featureLayer.bindPopup(
                    "fid_kaltim: "+feature.properties.fid_kaltim+("<br>")+
                    "ekse_5: "+feature.properties.ekse_5+("<br>")+
                    "kode: "+feature.properties.kode+("<br>")+
                    "luas: "+feature.properties.luas+("<br>")+
                    "sk_718: "+feature.properties.sk_718+("<br>")+
                    "sk_278: "+feature.properties.sk_278+("<br>")+
                    "sk_718_278: "+feature.properties.sk_718_278+("<br>")+
                    "hektar: "+feature.properties.hektar+("<br>")
                );
            }
        });
        datalayer._leaflet_id = 1;
        layerAPL.addLayer(datalayer);
        //newMap.fitBounds(datalayer.getBounds());
    }

    //TODO call polygon KPH
    function callPolygonKPH() {
        $.ajax({url:'{{env('APP_URL').'/api/polygon_kph/'.\Illuminate\Support\Facades\Auth::user()->kph->polygon_id}}',
            success: function (response) {
                if (Array.isArray(response.features) && response.features.length){
                    drawPolygonKPH(response);
                }else {
                    alert("Data Persil Kosong");
                }
            },
            error: function (xhr, status, error){
                alert("Error:"+error);
            }
        });
    }

    //TODO Draw Polygon KPH After Call
    function drawPolygonKPH(poly){
        datalayer = L.geoJson(poly.features,{
            style: {
                color : '#5ded8c',
                weight:3,
                opacity:0.65

            },
            onEachFeature: function(feature, featureLayer) {
                featureLayer.bindPopup(
                    "ekse_5: "+feature.properties.ekse_5+("<br>")+
                    "Nama KPH: "+feature.properties.nama_kph+("<br>")+
                    "Unit KPH: "+feature.properties.unit_kph+("<br>")+
                    "Jenis KPH: "+feature.properties.jenis_kph+("<br>")+
                    "Shape Length: "+feature.properties.shape_leng+("<br>")+
                    "Shape Area: "+feature.properties.shape_area+("<br>")+
                    "Hectares: "+feature.properties.hectares+("<br>")+
                    "Luas: "+feature.properties.luas+("<br>")
                );
            }
        });
        datalayer._leaflet_id = 2;
        layerKPH.addLayer(datalayer);
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

    //TODO call Polygon CC APL
    function callPolygonCCAPL(PolygonPersilID,elementCB) {
        if (elementCB.checked){
            $.ajax({url:'{{env('APP_URL').'/api/get_polygon_clean_apl/'}}'+PolygonPersilID,
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygonDifferenceAPL(response,PolygonPersilID);
                    }else {
                        alert("Data Persil Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }else{
            if (layerCCAPL.hasLayer(1000+PolygonPersilID)){
                layerCCAPL.removeLayer(1000+PolygonPersilID);
            }
        }
    }
    //TODO Draw Polygon CC APL
    function drawPolygonDifferenceAPL(poly,id){
        if (poly.features[0].properties.status==="Proses CC APL"){
            alert("Data persil masih dalam proses clean and clear, silahkan cek beberapa saat lagi");
        }else if(poly.features[0].geometry==null){
            document.getElementById("status-apl-"+id).textContent = "Clear and Clean";
            // alert("Data persil masih dalam proses clean and clear, silahkan cek beberapa saat lagi");
        }
        else if(poly.features[0].geometry.type==="GeometryCollection"){
            if(poly.features[0].geometry.geometries.length===0){
                document.getElementById("status-apl-"+id).textContent = "Clear and Clean";
            }
        }else{
            if(poly.features[0].geometry.coordinates.length===0){
                document.getElementById("status-apl-"+id).textContent = "Clear and Clean";
            }else{
                document.getElementById("status-apl-"+id).textContent = "ada area persil diluar dari APL: "+poly.features[0].properties.area+" Ha";
                document.getElementById("status-apl-"+id).className = "badge bg-danger bg-lighten-2 mb-0-1";
                // $("#status-"+id).val("ada sebagian area diluar dari peruntukan perkebunan seluas:"+poly.features[0].properties.area);
                datalayer = L.geoJson(poly.features,{
                    style: {
                        color : '#ed43ed',
                        weight:3
                    },
                    onEachFeature: function(feature, featureLayer) {
                        featureLayer.bindPopup(
                            "Luas diluar APL: "+feature.properties.area+" Ha"+("<br>")
                        );
                    }
                });
                datalayer._leaflet_id = 1000+id;
                layerCCAPL.addLayer(datalayer).addTo(newMap);
                newMap.fitBounds(datalayer.getBounds());
            }
        }
    }

    //TODO call Polygon CC KPH
    function callPolygonCCKPH(PolygonPersilID,elementCB) {
        if (elementCB.checked){
            var idKPH = '{!! \Illuminate\Support\Facades\Auth::user()->kph->polygon_id !!}';
            $.ajax({url:'{{env('APP_URL').'/api/get_polygon_clean_kph/'}}'+PolygonPersilID+'/'+idKPH,
                success: function (response) {
                    if (Array.isArray(response.features) && response.features.length){
                        drawPolygonCCKPH(response,PolygonPersilID);
                    }else {
                        alert("Data Hasil Clean and Clear KPH Kosong");
                    }
                },
                error: function (xhr, status, error){
                    alert("Error:"+error);
                }
            });
        }else{
            if (layerCCKPH.hasLayer(2000+PolygonPersilID)){
                layerCCKPH.removeLayer(2000+PolygonPersilID);
            }
        }
    }
    //TODO Draw Polygon CC KPH
    function drawPolygonCCKPH(poly,id){
        if(poly.features[0].geometry==null){
            alert("Data persil masih dalam proses clean and clear, silahkan cek beberapa saat lagi");
        }
        else if(poly.features[0].geometry.type==="GeometryCollection"){
            if(poly.features[0].geometry.geometries.length===0){
                document.getElementById("status-kph-"+id).textContent = "Clear and Clean";
            }
        }else{
            if(poly.features[0].geometry.coordinates.length===0){
                document.getElementById("status-kph-"+id).textContent = "Clear and Clean";
            }else{
                document.getElementById("status-kph-"+id).textContent = "ada area persil didalam area kawasan hutan: "+poly.features[0].properties.area+" Ha";
                document.getElementById("status-kph-"+id).className = "badge bg-danger bg-lighten-2 mb-0-1";
                datalayer = L.geoJson(poly.features,{
                    style: {
                        color : '#ff2500',
                        weight:3
                    },
                    onEachFeature: function(feature, featureLayer) {
                        featureLayer.bindPopup(
                            "Luas didalam kawasan hutan: "+feature.properties.area+" Ha"+("<br>")
                        );
                    }
                });
                datalayer._leaflet_id = 2000+id;
                layerCCKPH.addLayer(datalayer).addTo(newMap);
                newMap.fitBounds(datalayer.getBounds());
            }
        }
    }

    function callCleanAndClear(elementCB) {
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
            var id = parseInt({!! $item->persil->polygon_persil_id !!});
            callPolygonCCAPL(id,elementCB);
            callPolygonCCKPH(id,elementCB);
        @endforeach
    }

    $(document).ready(function() {
        callPolygonAPL();
        callPolygonKPH();
        @foreach($sTDBRegister->stdbDetailRegis as $key=>$item)
        callPolygonPersilByID({!! $item->persil->polygon_persil_id !!});
        @endforeach
    });
</script>
