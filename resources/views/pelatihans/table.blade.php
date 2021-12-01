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
        <th>Topik</th>
        <th>Tgl</th>
        <th>File Dok</th>
        <th>Jml Peserta</th>
        <th>Pelaksana</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pelatihans as $pelatihan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pelatihan->kode_koperasi !!}</td>
            <td>{!! $pelatihan->koperasi_id !!}</td>
            <td>{!! $pelatihan->topik !!}</td>
            <td>{!! $pelatihan->tgl !!}</td>
            <td>{!! $pelatihan->file_dok !!}</td>
            <td>{!! $pelatihan->jml_peserta !!}</td>
            <td>{!! $pelatihan->pelaksana !!}</td>
            <td>
                {!! Form::open(['route' => ['pelatihans.destroy', $pelatihan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pelatihans.show', [$pelatihan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pelatihans.edit', [$pelatihan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
