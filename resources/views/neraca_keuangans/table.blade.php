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
        <th>Periode</th>
        <th>Kas Saprodi</th>
        <th>Kas Replanting</th>
        <th>Piutang Saprodi</th>
        <th>Piutang Simpin</th>
        <th>Stok Barang</th>
        <th>Potongan Admin</th>
        <th>Fee Pengelolaan Penjualan Tbs</th>
        <th>Ht Tanah</th>
        <th>Ht Bangunan Non Permanen</th>
        <th>Simpanan Pokok</th>
        <th>Simpanan Wajib</th>
        <th>Modal Tanah</th>
        <th>Modal Bangunan</th>
        <th>Modal Saprodi</th>
        <th>Biaya Bangun Kantor</th>
        <th>Biaya Atk Dan Konsumsi</th>
        <th>Biaya Rat</th>
        <th>Gaji</th>
        <th>Laba Simpin</th>
        <th>Laba Saprodi</th>
        <th>Laba Harta Tetap</th>
        <th>Pajak Saprodi</th>
        <th>Kas Admin</th>
        <th>Biaya Lain 1</th>
        <th>Biaya Lain 2</th>
        <th>Biaya Lain 3</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($neracaKeuangans as $neracaKeuangan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $neracaKeuangan->kode_koperasi !!}</td>
            <td>{!! $neracaKeuangan->koperasi_id !!}</td>
            <td>{!! $neracaKeuangan->periode !!}</td>
            <td>{!! $neracaKeuangan->kas_saprodi !!}</td>
            <td>{!! $neracaKeuangan->kas_replanting !!}</td>
            <td>{!! $neracaKeuangan->piutang_saprodi !!}</td>
            <td>{!! $neracaKeuangan->piutang_simpin !!}</td>
            <td>{!! $neracaKeuangan->stok_barang !!}</td>
            <td>{!! $neracaKeuangan->potongan_admin !!}</td>
            <td>{!! $neracaKeuangan->fee_pengelolaan_penjualan_tbs !!}</td>
            <td>{!! $neracaKeuangan->ht_tanah !!}</td>
            <td>{!! $neracaKeuangan->ht_bangunan_non_permanen !!}</td>
            <td>{!! $neracaKeuangan->simpanan_pokok !!}</td>
            <td>{!! $neracaKeuangan->simpanan_wajib !!}</td>
            <td>{!! $neracaKeuangan->modal_tanah !!}</td>
            <td>{!! $neracaKeuangan->modal_bangunan !!}</td>
            <td>{!! $neracaKeuangan->modal_saprodi !!}</td>
            <td>{!! $neracaKeuangan->biaya_bangun_kantor !!}</td>
            <td>{!! $neracaKeuangan->biaya_atk_dan_konsumsi !!}</td>
            <td>{!! $neracaKeuangan->biaya_rat !!}</td>
            <td>{!! $neracaKeuangan->gaji !!}</td>
            <td>{!! $neracaKeuangan->laba_simpin !!}</td>
            <td>{!! $neracaKeuangan->laba_saprodi !!}</td>
            <td>{!! $neracaKeuangan->laba_harta_tetap !!}</td>
            <td>{!! $neracaKeuangan->pajak_saprodi !!}</td>
            <td>{!! $neracaKeuangan->kas_admin !!}</td>
            <td>{!! $neracaKeuangan->biaya_lain_1 !!}</td>
            <td>{!! $neracaKeuangan->biaya_lain_2 !!}</td>
            <td>{!! $neracaKeuangan->biaya_lain_3 !!}</td>
            <td>
                {!! Form::open(['route' => ['neracaKeuangans.destroy', $neracaKeuangan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('neracaKeuangans.show', [$neracaKeuangan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('neracaKeuangans.edit', [$neracaKeuangan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
