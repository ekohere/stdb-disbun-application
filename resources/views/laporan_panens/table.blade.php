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
        <th>Persil Id</th>
        <th>Pekerja Id</th>
        <th>Kode Panen</th>
        <th>Nomor Persil</th>
        <th>Tgl Panen</th>
        <th>Luas</th>
        <th>Rotasi</th>
        <th>Hk</th>
        <th>Jml Jjg</th>
        <th>Berat Brondol</th>
        <th>Berat Kirim</th>
        <th>Keterangan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($laporanPanens as $laporanPanen)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $laporanPanen->kode_koperasi !!}</td>
            <td>{!! $laporanPanen->koperasi_id !!}</td>
            <td>{!! $laporanPanen->persil_id !!}</td>
            <td>{!! $laporanPanen->pekerja_id !!}</td>
            <td>{!! $laporanPanen->kode_panen !!}</td>
            <td>{!! $laporanPanen->nomor_persil !!}</td>
            <td>{!! $laporanPanen->tgl_panen !!}</td>
            <td>{!! $laporanPanen->luas !!}</td>
            <td>{!! $laporanPanen->rotasi !!}</td>
            <td>{!! $laporanPanen->hk !!}</td>
            <td>{!! $laporanPanen->jml_jjg !!}</td>
            <td>{!! $laporanPanen->berat_brondol !!}</td>
            <td>{!! $laporanPanen->berat_kirim !!}</td>
            <td>{!! $laporanPanen->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['laporanPanens.destroy', $laporanPanen->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('laporanPanens.show', [$laporanPanen->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('laporanPanens.edit', [$laporanPanen->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
