<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-responsive table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Users Id</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>No Ktp</th>
        <th>Alamat</th>
        <th>Kecamatan</th>
        <th>Desa</th>
        <th>Jenis Kelamin</th>
        <th>Status Dlm Keluarga</th>
        <th>Jml Anggota Keluarga</th>
        <th>Pendidikan Terakhir</th>
        <th>Pekerjaan Lain</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sTDBProfiles as $sTDBProfile)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $sTDBProfile->users_id !!}</td>
            <td>{!! $sTDBProfile->tempat_lahir !!}</td>
            <td>{!! $sTDBProfile->tgl_lahir !!}</td>
            <td>{!! $sTDBProfile->no_ktp !!}</td>
            <td>{!! $sTDBProfile->alamat !!}</td>
            <td>{!! $sTDBProfile->kecamatan !!}</td>
            <td>{!! $sTDBProfile->desa !!}</td>
            <td>{!! $sTDBProfile->jenis_kelamin !!}</td>
            <td>{!! $sTDBProfile->status_dlm_keluarga !!}</td>
            <td>{!! $sTDBProfile->jml_anggota_keluarga !!}</td>
            <td>{!! $sTDBProfile->pendidikan_terakhir !!}</td>
            <td>{!! $sTDBProfile->pekerjaan_lain !!}</td>
            <td>
                {!! Form::open(['route' => ['sTDBProfiles.destroy', $sTDBProfile->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('sTDBProfiles.show', [$sTDBProfile->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('sTDBProfiles.edit', [$sTDBProfile->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
