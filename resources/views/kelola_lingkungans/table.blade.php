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
        <th>Persil Id</th>
        <th>Petak Id</th>
        <th>Nama Pekebun</th>
        <th>Tgl Kelola</th>
        <th>Kegiatan</th>
        <th>Org Terlibat</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($kelolaLingkungans as $kelolaLingkungan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $kelolaLingkungan->koperasi_id !!}</td>
            <td>{!! $kelolaLingkungan->kode_koperasi !!}</td>
            <td>{!! $kelolaLingkungan->persil_id !!}</td>
            <td>{!! $kelolaLingkungan->petak_id !!}</td>
            <td>{!! $kelolaLingkungan->nama_pekebun !!}</td>
            <td>{!! $kelolaLingkungan->tgl_kelola !!}</td>
            <td>{!! $kelolaLingkungan->kegiatan !!}</td>
            <td>{!! $kelolaLingkungan->org_terlibat !!}</td>
            <td>
                {!! Form::open(['route' => ['kelolaLingkungans.destroy', $kelolaLingkungan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('kelolaLingkungans.show', [$kelolaLingkungan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('kelolaLingkungans.edit', [$kelolaLingkungan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
