<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Kode Kec</th>
        <th>Kode Koperasi</th>
        <th>Nama Koperasi</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($koperasis as $koperasi)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $koperasi->kode_kec !!}</td>
            <td>{!! $koperasi->kode_koperasi !!}</td>
            <td>{!! $koperasi->nama_koperasi !!}</td>
            <td>{!! $koperasi->alamat !!}</td>
            <td>{!! $koperasi->telepon !!}</td>
            <td>
                {!! Form::open(['route' => ['koperasis.destroy', $koperasi->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('koperasis.show', [$koperasi->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('koperasis.edit', [$koperasi->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
