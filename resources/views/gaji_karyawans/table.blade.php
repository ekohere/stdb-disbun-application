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
        <th>Periode Bulan</th>
        <th>Periode Tahun</th>
        <th>Karyawan Id</th>
        <th>Gaji Pokok</th>
        <th>Tj Jabatan</th>
        <th>Tj Konsumsi</th>
        <th>Tj Harian</th>
        <th>Bonus Target Lembur</th>
        <th>Potongan Pph 21</th>
        <th>Potongan Asuransi</th>
        <th>Potongan Bulan Lalu</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($gajiKaryawans as $gajiKaryawan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $gajiKaryawan->koperasi_id !!}</td>
            <td>{!! $gajiKaryawan->kode_koperasi !!}</td>
            <td>{!! $gajiKaryawan->periode_bulan !!}</td>
            <td>{!! $gajiKaryawan->periode_tahun !!}</td>
            <td>{!! $gajiKaryawan->karyawan_id !!}</td>
            <td>{!! $gajiKaryawan->gaji_pokok !!}</td>
            <td>{!! $gajiKaryawan->tj_jabatan !!}</td>
            <td>{!! $gajiKaryawan->tj_konsumsi !!}</td>
            <td>{!! $gajiKaryawan->tj_harian !!}</td>
            <td>{!! $gajiKaryawan->bonus_target_lembur !!}</td>
            <td>{!! $gajiKaryawan->potongan_pph_21 !!}</td>
            <td>{!! $gajiKaryawan->potongan_asuransi !!}</td>
            <td>{!! $gajiKaryawan->potongan_bulan_lalu !!}</td>
            <td>
                {!! Form::open(['route' => ['gajiKaryawans.destroy', $gajiKaryawan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('gajiKaryawans.show', [$gajiKaryawan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('gajiKaryawans.edit', [$gajiKaryawan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
