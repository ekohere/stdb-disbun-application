<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Kode Anggota</th>
        <th>Koperasi Id</th>
        <th>Kode Koperasi</th>
        <th>Nama Ktp</th>
        <th>Nomor Ktp</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Alamat Ktp</th>
        <th>Alamat Desa Ktp</th>
        <th>Alamat Kec Ktp</th>
        <th>Jenis Kelamin</th>
        <th>Status Dlm Keluarga</th>
        <th>Jml Anggota Keluarga</th>
        <th>Pendidikan Terakhir</th>
        <th>Pekerjaan Lain</th>
        <th>Lampiran Identitas</th>
        <th>Lampiran Foto Anggota</th>
        <th>Status Anggota</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($anggotas as $anggota)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $anggota->kode_anggota !!}</td>
            <td>{!! $anggota->koperasi_id !!}</td>
            <td>{!! $anggota->kode_koperasi !!}</td>
            <td>{!! $anggota->nama_ktp !!}</td>
            <td>{!! $anggota->nomor_ktp !!}</td>
            <td>{!! $anggota->tempat_lahir !!}</td>
            <td>{!! $anggota->tgl_lahir !!}</td>
            <td>{!! $anggota->alamat_ktp !!}</td>
            <td>{!! $anggota->alamat_desa_ktp !!}</td>
            <td>{!! $anggota->alamat_kec_ktp !!}</td>
            <td>{!! $anggota->jenis_kelamin !!}</td>
            <td>{!! $anggota->status_dlm_keluarga !!}</td>
            <td>{!! $anggota->jml_anggota_keluarga !!}</td>
            <td>{!! $anggota->pendidikan_terakhir !!}</td>
            <td>{!! $anggota->pekerjaan_lain !!}</td>
            <td>{!! $anggota->lampiran_identitas !!}</td>
            <td>{!! $anggota->lampiran_foto_anggota !!}</td>
            <td>{!! $anggota->status_anggota !!}</td>
            <td>
                {!! Form::open(['route' => ['anggotas.destroy', $anggota->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('anggotas.show', [$anggota->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('anggotas.edit', [$anggota->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
