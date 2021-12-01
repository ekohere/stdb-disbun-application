<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Kode Koperasi</th>
        <th>Koperasi Id</th>
        <th>Kode Anggota</th>
        <th>Anggota Id</th>
        <th>Kelompok Tani</th>
        <th>Kode Persil</th>
        <th>No Petak Peta</th>
        <th>Luas Lahan Peta</th>
        <th>Nama Peta</th>
        <th>Luas Lahan</th>
        <th>Status Lahan</th>
        <th>Nomor Surat Lahan</th>
        <th>Jenis Tanaman</th>
        <th>Luas Lahan Tanam Telah Produksi</th>
        <th>Luas Lahan Tanam Belum Produksi</th>
        <th>Luas Lahan Belum Tanam</th>
        <th>Rata Panen Bulan</th>
        <th>Rata Panen Tahun</th>
        <th>Rata Produksi Dalam Panen</th>
        <th>Total Produksi Setahun</th>
        <th>Produktifitas Lahan</th>
        <th>Rata Harga Jual Tbs</th>
        <th>Total Penjualan Tbs Tahun</th>
        <th>Rata Umur Tanaman</th>
        <th>Bulan Tanam</th>
        <th>Tahun Tanam</th>
        <th>Jml Pohon</th>
        <th>Pola Tanam</th>
        <th>Laham Gambut Or Non</th>
        <th>Topografi</th>
        <th>Metode Bukaan Lahan</th>
        <th>Asal Benih</th>
        <th>Pupuk Per Tahun</th>
        <th>Jml Benih Per Tahun</th>
        <th>Jenis Pupuk</th>
        <th>Jenis Pupuk Digunakan</th>
        <th>Mitra Pengolahan</th>
        <th>Pupuk Tambah Upah</th>
        <th>Pestisida Tambah Upah</th>
        <th>Pembersihan Tambah Upah</th>
        <th>Panen Tambah Upah</th>
        <th>Biaya Lain</th>
        <th>Total Biaya Produksi</th>
        <th>Apakah Kesulitan Menjual</th>
        <th>Jenis Kesulitan</th>
        <th>Kesulitan Lainnya</th>
        <th>Penentuan Harga Jual</th>
        <th>Lahan Yg Perlu Diremajakan</th>
        <th>Luas Peremajaan</th>
        <th>Bentuk Skema Peremajaan</th>
        <th>Lampiran Shm</th>
        <th>Lampiran Identitas</th>
        <th>Lampiran Foto Anggota</th>
        <th>Geojson Persil</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($persils as $persil)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $persil->kode_koperasi !!}</td>
            <td>{!! $persil->koperasi_id !!}</td>
            <td>{!! $persil->kode_anggota !!}</td>
            <td>{!! $persil->anggota_id !!}</td>
            <td>{!! $persil->kelompok_tani !!}</td>
            <td>{!! $persil->kode_persil !!}</td>
            <td>{!! $persil->no_petak_peta !!}</td>
            <td>{!! $persil->luas_lahan_peta !!}</td>
            <td>{!! $persil->nama_peta !!}</td>
            <td>{!! $persil->luas_lahan !!}</td>
            <td>{!! $persil->status_lahan !!}</td>
            <td>{!! $persil->nomor_surat_lahan !!}</td>
            <td>{!! $persil->jenis_tanaman !!}</td>
            <td>{!! $persil->luas_lahan_tanam_telah_produksi !!}</td>
            <td>{!! $persil->luas_lahan_tanam_belum_produksi !!}</td>
            <td>{!! $persil->luas_lahan_belum_tanam !!}</td>
            <td>{!! $persil->rata_panen_bulan !!}</td>
            <td>{!! $persil->rata_panen_tahun !!}</td>
            <td>{!! $persil->rata_produksi_dalam_panen !!}</td>
            <td>{!! $persil->total_produksi_setahun !!}</td>
            <td>{!! $persil->produktifitas_lahan !!}</td>
            <td>{!! $persil->rata_harga_jual_tbs !!}</td>
            <td>{!! $persil->total_penjualan_tbs_tahun !!}</td>
            <td>{!! $persil->rata_umur_tanaman !!}</td>
            <td>{!! $persil->bulan_tanam !!}</td>
            <td>{!! $persil->tahun_tanam !!}</td>
            <td>{!! $persil->jml_pohon !!}</td>
            <td>{!! $persil->pola_tanam !!}</td>
            <td>{!! $persil->laham_gambut_or_non !!}</td>
            <td>{!! $persil->topografi !!}</td>
            <td>{!! $persil->metode_bukaan_lahan !!}</td>
            <td>{!! $persil->asal_benih !!}</td>
            <td>{!! $persil->pupuk_per_tahun !!}</td>
            <td>{!! $persil->jml_benih_per_tahun !!}</td>
            <td>{!! $persil->jenis_pupuk !!}</td>
            <td>{!! $persil->jenis_pupuk_digunakan !!}</td>
            <td>{!! $persil->mitra_pengolahan !!}</td>
            <td>{!! $persil->pupuk_tambah_upah !!}</td>
            <td>{!! $persil->pestisida_tambah_upah !!}</td>
            <td>{!! $persil->pembersihan_tambah_upah !!}</td>
            <td>{!! $persil->panen_tambah_upah !!}</td>
            <td>{!! $persil->biaya_lain !!}</td>
            <td>{!! $persil->total_biaya_produksi !!}</td>
            <td>{!! $persil->apakah_kesulitan_menjual !!}</td>
            <td>{!! $persil->jenis_kesulitan !!}</td>
            <td>{!! $persil->kesulitan_lainnya !!}</td>
            <td>{!! $persil->penentuan_harga_jual !!}</td>
            <td>{!! $persil->lahan_yg_perlu_diremajakan !!}</td>
            <td>{!! $persil->luas_peremajaan !!}</td>
            <td>{!! $persil->bentuk_skema_peremajaan !!}</td>
            <td>{!! $persil->lampiran_shm !!}</td>
            <td>{!! $persil->lampiran_identitas !!}</td>
            <td>{!! $persil->lampiran_foto_anggota !!}</td>
            <td>{!! $persil->geojson_persil !!}</td>
            <td>
                {!! Form::open(['route' => ['persils.destroy', $persil->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('persils.show', [$persil->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('persils.edit', [$persil->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
