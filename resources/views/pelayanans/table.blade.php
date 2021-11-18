<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Name</th>
        <th>Information</th>
        <th>Jenis Pelayanan</th>
        <th>Syarat Pelayanan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pelayanans as $pelayanan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pelayanan->name !!}</td>
            <td>{!! $pelayanan->information !!}</td>
            <td>{!! $pelayanan->jenisPelayanan->name !!}</td>
            <td>
                <a href="{!! route('syaratPelayanans.index', ['pelayanan_id'=>$pelayanan->id]) !!}" class="btn btn-sm btn-warning">Ubah Syarat Pelayanan</a>
            </td>
            <td>
                {!! Form::open(['route' => ['pelayanans.destroy', $pelayanan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pelayanans.show', [$pelayanan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pelayanans.edit', [$pelayanan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
