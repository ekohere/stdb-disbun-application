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
        <th>Kode Sopir</th>
        <th>Nama Driver</th>
        <th>Lampiran Sim</th>
        <th>Hp</th>
        <th>Alamat</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($drivers as $driver)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $driver->koperasi_id !!}</td>
            <td>{!! $driver->kode_koperasi !!}</td>
            <td>{!! $driver->kode_sopir !!}</td>
            <td>{!! $driver->nama_driver !!}</td>
            <td>{!! $driver->lampiran_sim !!}</td>
            <td>{!! $driver->hp !!}</td>
            <td>{!! $driver->alamat !!}</td>
            <td>
                {!! Form::open(['route' => ['drivers.destroy', $driver->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('drivers.show', [$driver->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('drivers.edit', [$driver->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
