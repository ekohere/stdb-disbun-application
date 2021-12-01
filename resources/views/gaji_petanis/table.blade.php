<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Koperasi Id</th>
        <th>Kode Koperasi</th>
        <th>Anggota Id</th>
        <th>Kode Anggota</th>
        <th>Tipe Fee Koperasi</th>
        <th>Pot Koperasi</th>
        <th>Pot Transport</th>
        <th>Pot Admin</th>
        <th>Pot Biaya Timbang</th>
        <th>Pot Langsir</th>
        <th>Pot Kredit Saprodi</th>
        <th>Pot Perawatan Jalan</th>
        <th>Pot Iuran Wajib</th>
        <th>Pot Pinjaman Koperasi</th>
        <th>Pot Pupuk Induk</th>
        <th>Pot Pinjaman Bank</th>
        <th>Pot Zakat</th>
        <th>Pot Infaq</th>
        <th>Metode Pembayaran</th>
        <th>Status Bayar</th>
        <th>Tgl Bayar</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($gajiPetanis as $gajiPetani)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $gajiPetani->koperasi_id !!}</td>
            <td>{!! $gajiPetani->kode_koperasi !!}</td>
            <td>{!! $gajiPetani->anggota_id !!}</td>
            <td>{!! $gajiPetani->kode_anggota !!}</td>
            <td>{!! $gajiPetani->tipe_fee_koperasi !!}</td>
            <td>{!! $gajiPetani->pot_koperasi !!}</td>
            <td>{!! $gajiPetani->pot_transport !!}</td>
            <td>{!! $gajiPetani->pot_admin !!}</td>
            <td>{!! $gajiPetani->pot_biaya_timbang !!}</td>
            <td>{!! $gajiPetani->pot_langsir !!}</td>
            <td>{!! $gajiPetani->pot_kredit_saprodi !!}</td>
            <td>{!! $gajiPetani->pot_perawatan_jalan !!}</td>
            <td>{!! $gajiPetani->pot_iuran_wajib !!}</td>
            <td>{!! $gajiPetani->pot_pinjaman_koperasi !!}</td>
            <td>{!! $gajiPetani->pot_pupuk_induk !!}</td>
            <td>{!! $gajiPetani->pot_pinjaman_bank !!}</td>
            <td>{!! $gajiPetani->pot_zakat !!}</td>
            <td>{!! $gajiPetani->pot_infaq !!}</td>
            <td>{!! $gajiPetani->metode_pembayaran !!}</td>
            <td>{!! $gajiPetani->status_bayar !!}</td>
            <td>{!! $gajiPetani->tgl_bayar !!}</td>
            <td>
                {!! Form::open(['route' => ['gajiPetanis.destroy', $gajiPetani->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('gajiPetanis.show', [$gajiPetani->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('gajiPetanis.edit', [$gajiPetani->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
