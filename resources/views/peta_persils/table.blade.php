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
        <th>Judul</th>
        <th>File Geojson</th>
        <th>Aktif</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($petaPersils as $petaPersil)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $petaPersil->kode_koperasi !!}</td>
            <td>{!! $petaPersil->koperasi_id !!}</td>
            <td>{!! $petaPersil->judul !!}</td>
            <td>{!! $petaPersil->file_geojson !!}</td>
            <td>{!! $petaPersil->aktif !!}</td>
            <td>
                {!! Form::open(['route' => ['petaPersils.destroy', $petaPersil->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('petaPersils.show', [$petaPersil->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('petaPersils.edit', [$petaPersil->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
