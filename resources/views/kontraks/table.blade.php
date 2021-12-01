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
        <th>Pks Id</th>
        <th>Harga Id</th>
        <th>Nomor Kontrak</th>
        <th>Tgl Kontrak</th>
        <th>Periode Kontrak</th>
        <th>Volume</th>
        <th>Harga Aktual</th>
        <th>File Kontrak</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kontraks as $kontrak)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $kontrak->kode_koperasi !!}</td>
            <td>{!! $kontrak->koperasi_id !!}</td>
            <td>{!! $kontrak->pks_id !!}</td>
            <td>{!! $kontrak->harga_id !!}</td>
            <td>{!! $kontrak->nomor_kontrak !!}</td>
            <td>{!! $kontrak->tgl_kontrak !!}</td>
            <td>{!! $kontrak->periode_kontrak !!}</td>
            <td>{!! $kontrak->volume !!}</td>
            <td>{!! $kontrak->harga_aktual !!}</td>
            <td>{!! $kontrak->file_kontrak !!}</td>
            <td>
                {!! Form::open(['route' => ['kontraks.destroy', $kontrak->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('kontraks.show', [$kontrak->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('kontraks.edit', [$kontrak->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
