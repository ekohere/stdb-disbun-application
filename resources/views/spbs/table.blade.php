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
        <th>No Spb</th>
        <th>Tgl Spb</th>
        <th>Transport Id</th>
        <th>Driver Id</th>
        <th>Pks Tujuan</th>
        <th>Penerima</th>
        <th>Pengangkut</th>
        <th>Pengirim</th>
        <th>Jab Pengirim</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($spbs as $spb)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $spb->kode_koperasi !!}</td>
            <td>{!! $spb->koperasi_id !!}</td>
            <td>{!! $spb->no_spb !!}</td>
            <td>{!! $spb->tgl_spb !!}</td>
            <td>{!! $spb->transport_id !!}</td>
            <td>{!! $spb->driver_id !!}</td>
            <td>{!! $spb->pks_tujuan !!}</td>
            <td>{!! $spb->penerima !!}</td>
            <td>{!! $spb->pengangkut !!}</td>
            <td>{!! $spb->pengirim !!}</td>
            <td>{!! $spb->jab_pengirim !!}</td>
            <td>
                {!! Form::open(['route' => ['spbs.destroy', $spb->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('spbs.show', [$spb->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('spbs.edit', [$spb->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
