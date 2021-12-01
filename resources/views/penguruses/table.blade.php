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
        <th>Nama</th>
        <th>Golongan</th>
        <th>Jabatan</th>
        <th>Nik</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Alamat</th>
        <th>Tgl Masuk</th>
        <th>Tgl Keluar</th>
        <th>Status Kawin</th>
        <th>Status</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($penguruses as $pengurus)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pengurus->kode_koperasi !!}</td>
            <td>{!! $pengurus->koperasi_id !!}</td>
            <td>{!! $pengurus->nama !!}</td>
            <td>{!! $pengurus->golongan !!}</td>
            <td>{!! $pengurus->jabatan !!}</td>
            <td>{!! $pengurus->nik !!}</td>
            <td>{!! $pengurus->tempat_lahir !!}</td>
            <td>{!! $pengurus->tgl_lahir !!}</td>
            <td>{!! $pengurus->alamat !!}</td>
            <td>{!! $pengurus->tgl_masuk !!}</td>
            <td>{!! $pengurus->tgl_keluar !!}</td>
            <td>{!! $pengurus->status_kawin !!}</td>
            <td>{!! $pengurus->status !!}</td>
            <td>
                {!! Form::open(['route' => ['penguruses.destroy', $pengurus->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('penguruses.show', [$pengurus->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('penguruses.edit', [$pengurus->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
