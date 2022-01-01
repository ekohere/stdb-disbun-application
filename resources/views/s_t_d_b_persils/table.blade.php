<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-responsive table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Users Id</th>
        <th>Status Lahan</th>
        <th>No Surat Lahan</th>
        <th>Jenis Tanaman</th>
        <th>Luas Lahan Tanam Telah Produksi</th>
        <th>Luas Lahan Tanam Belum Produksi</th>
        <th>Luas Lahan Belum Tanam</th>
        <th>Rata Panen Bulan</th>
        <th>Rata Panen Tahun</th>
        <th>Total Produksi Setahun</th>
        <th>Rata Produksi Dalam Panen</th>
        <th>Produktifitas Lahan</th>
        <th>Rata Harga Jual Tbs</th>
        <th>Total Penjualan Tbs Tahun</th>
        <th>Rata Umur Tanaman</th>
        <th>Bulan Tanam</th>
        <th>Tahun Tanam</th>
        <th>Jml Pohon</th>
        <th>Pola Tanam</th>
        <th>Lahan Gambut Or Non</th>
        <th>Topografi</th>
        <th>Metode Bukaan Lahan</th>
        <th>Asal Benih</th>
        <th>Jenis Pupuk</th>
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
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sTDBPersils as $sTDBPersil)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $sTDBPersil->users_id !!}</td>
            <td>{!! $sTDBPersil->status_lahan !!}</td>
            <td>{!! $sTDBPersil->no_surat_lahan !!}</td>
            <td>{!! $sTDBPersil->jenis_tanaman !!}</td>
            <td>{!! $sTDBPersil->luas_lahan_tanam_telah_produksi !!}</td>
            <td>{!! $sTDBPersil->luas_lahan_tanam_belum_produksi !!}</td>
            <td>{!! $sTDBPersil->luas_lahan_belum_tanam !!}</td>
            <td>{!! $sTDBPersil->rata_panen_bulan !!}</td>
            <td>{!! $sTDBPersil->rata_panen_tahun !!}</td>
            <td>{!! $sTDBPersil->total_produksi_setahun !!}</td>
            <td>{!! $sTDBPersil->rata_produksi_dalam_panen !!}</td>
            <td>{!! $sTDBPersil->produktifitas_lahan !!}</td>
            <td>{!! $sTDBPersil->rata_harga_jual_tbs !!}</td>
            <td>{!! $sTDBPersil->total_penjualan_tbs_tahun !!}</td>
            <td>{!! $sTDBPersil->rata_umur_tanaman !!}</td>
            <td>{!! $sTDBPersil->bulan_tanam !!}</td>
            <td>{!! $sTDBPersil->tahun_tanam !!}</td>
            <td>{!! $sTDBPersil->jml_pohon !!}</td>
            <td>{!! $sTDBPersil->pola_tanam !!}</td>
            <td>{!! $sTDBPersil->lahan_gambut_or_non !!}</td>
            <td>{!! $sTDBPersil->topografi !!}</td>
            <td>{!! $sTDBPersil->metode_bukaan_lahan !!}</td>
            <td>{!! $sTDBPersil->asal_benih !!}</td>
            <td>{!! $sTDBPersil->jenis_pupuk !!}</td>
            <td>{!! $sTDBPersil->mitra_pengolahan !!}</td>
            <td>{!! $sTDBPersil->pupuk_tambah_upah !!}</td>
            <td>{!! $sTDBPersil->pestisida_tambah_upah !!}</td>
            <td>{!! $sTDBPersil->pembersihan_tambah_upah !!}</td>
            <td>{!! $sTDBPersil->panen_tambah_upah !!}</td>
            <td>{!! $sTDBPersil->biaya_lain !!}</td>
            <td>{!! $sTDBPersil->total_biaya_produksi !!}</td>
            <td>{!! $sTDBPersil->apakah_kesulitan_menjual !!}</td>
            <td>{!! $sTDBPersil->jenis_kesulitan !!}</td>
            <td>{!! $sTDBPersil->kesulitan_lainnya !!}</td>
            <td>{!! $sTDBPersil->penentuan_harga_jual !!}</td>
            <td>{!! $sTDBPersil->lahan_yg_perlu_diremajakan !!}</td>
            <td>{!! $sTDBPersil->luas_peremajaan !!}</td>
            <td>{!! $sTDBPersil->bentuk_skema_peremajaan !!}</td>
            <td>
                {!! Form::open(['route' => ['sTDBPersils.destroy', $sTDBPersil->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('sTDBPersils.show', [$sTDBPersil->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('sTDBPersils.edit', [$sTDBPersil->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
