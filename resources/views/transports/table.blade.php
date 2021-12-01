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
        <th>Nama Pemilik</th>
        <th>Alamat Pemilik</th>
        <th>Kapasitas</th>
        <th>Nomor Plat</th>
        <th>Kode Transport</th>
        <th>Lampiran Stnk</th>
        <th>Lampiran Lainnya</th>
        <th>Ket</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($transports as $transport)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $transport->kode_koperasi !!}</td>
            <td>{!! $transport->koperasi_id !!}</td>
            <td>{!! $transport->nama_pemilik !!}</td>
            <td>{!! $transport->alamat_pemilik !!}</td>
            <td>{!! $transport->kapasitas !!}</td>
            <td>{!! $transport->nomor_plat !!}</td>
            <td>{!! $transport->kode_transport !!}</td>
            <td>{!! $transport->lampiran_stnk !!}</td>
            <td>{!! $transport->lampiran_lainnya !!}</td>
            <td>{!! $transport->ket !!}</td>
            <td>
                {!! Form::open(['route' => ['transports.destroy', $transport->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('transports.show', [$transport->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('transports.edit', [$transport->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
