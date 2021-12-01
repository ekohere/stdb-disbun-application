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
        <th>Nomor Mitra</th>
        <th>Nama Mitra</th>
        <th>Jenis</th>
        <th>Alamat</th>
        <th>Kontak</th>
        <th>Email</th>
        <th>Status</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($mitras as $mitra)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $mitra->kode_koperasi !!}</td>
            <td>{!! $mitra->koperasi_id !!}</td>
            <td>{!! $mitra->nomor_mitra !!}</td>
            <td>{!! $mitra->nama_mitra !!}</td>
            <td>{!! $mitra->jenis !!}</td>
            <td>{!! $mitra->alamat !!}</td>
            <td>{!! $mitra->kontak !!}</td>
            <td>{!! $mitra->email !!}</td>
            <td>{!! $mitra->status !!}</td>
            <td>
                {!! Form::open(['route' => ['mitras.destroy', $mitra->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('mitras.show', [$mitra->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('mitras.edit', [$mitra->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
