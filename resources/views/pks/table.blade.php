<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Nama Perusahaan</th>
        <th>Mill Name</th>
        <th>Group Perusahaan</th>
        <th>Alamat Pabrik</th>
        <th>Koordinat X</th>
        <th>Koordinat Y</th>
        <th>Kapasitas Terpasang</th>
        <th>Kapasitas Olah</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pks as $pks)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pks->nama_perusahaan !!}</td>
            <td>{!! $pks->mill_name !!}</td>
            <td>{!! $pks->group_perusahaan !!}</td>
            <td>{!! $pks->alamat_pabrik !!}</td>
            <td>{!! $pks->koordinat_x !!}</td>
            <td>{!! $pks->koordinat_y !!}</td>
            <td>{!! $pks->kapasitas_terpasang !!}</td>
            <td>{!! $pks->kapasitas_olah !!}</td>
            <td>
                {!! Form::open(['route' => ['pks.destroy', $pks->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pks.show', [$pks->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pks.edit', [$pks->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
