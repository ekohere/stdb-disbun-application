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
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Harga3</th>
        <th>Harga4</th>
        <th>Harga5</th>
        <th>Harga6</th>
        <th>Harga7</th>
        <th>Harga8</th>
        <th>Harga9</th>
        <th>Harga10</th>
        <th>Keterangan</th>
        <th>Nomor Sk Gub</th>
        <th>Tgl Sk Gub</th>
        <th>File Sk Gub</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($hargas as $harga)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $harga->koperasi_id !!}</td>
            <td>{!! $harga->kode_koperasi !!}</td>
            <td>{!! $harga->bulan !!}</td>
            <td>{!! $harga->tahun !!}</td>
            <td>{!! $harga->harga3 !!}</td>
            <td>{!! $harga->harga4 !!}</td>
            <td>{!! $harga->harga5 !!}</td>
            <td>{!! $harga->harga6 !!}</td>
            <td>{!! $harga->harga7 !!}</td>
            <td>{!! $harga->harga8 !!}</td>
            <td>{!! $harga->harga9 !!}</td>
            <td>{!! $harga->harga10 !!}</td>
            <td>{!! $harga->keterangan !!}</td>
            <td>{!! $harga->nomor_sk_gub !!}</td>
            <td>{!! $harga->tgl_sk_gub !!}</td>
            <td>{!! $harga->file_sk_gub !!}</td>
            <td>
                {!! Form::open(['route' => ['hargas.destroy', $harga->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('hargas.show', [$harga->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('hargas.edit', [$harga->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
