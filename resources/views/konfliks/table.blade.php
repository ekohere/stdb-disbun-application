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
        <th>Tgl Konflik</th>
        <th>Pihak Terlibat</th>
        <th>Jenis Konflik</th>
        <th>Deskripsi Singkat</th>
        <th>Penyelesaian</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($konfliks as $konflik)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $konflik->kode_koperasi !!}</td>
            <td>{!! $konflik->koperasi_id !!}</td>
            <td>{!! $konflik->persil_id !!}</td>
            <td>{!! $konflik->tgl_konflik !!}</td>
            <td>{!! $konflik->pihak_terlibat !!}</td>
            <td>{!! $konflik->jenis_konflik !!}</td>
            <td>{!! $konflik->deskripsi_singkat !!}</td>
            <td>{!! $konflik->penyelesaian !!}</td>
            <td>{!! $konflik->keterangan !!}</td>
            <td>{!! $konflik->status !!}</td>
            <td>
                {!! Form::open(['route' => ['konfliks.destroy', $konflik->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('konfliks.show', [$konflik->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('konfliks.edit', [$konflik->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
