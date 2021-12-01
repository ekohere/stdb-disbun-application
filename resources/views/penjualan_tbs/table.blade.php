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
        <th>Panen Id</th>
        <th>Spb Id</th>
        <th>Tgl Penjualan</th>
        <th>Pot Susut</th>
        <th>Pot Sortasi</th>
        <th>Harga Tbs</th>
        <th>Keterangan</th>
        <th>File Upload</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($penjualanTbs as $penjualanTbs)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $penjualanTbs->kode_koperasi !!}</td>
            <td>{!! $penjualanTbs->koperasi_id !!}</td>
            <td>{!! $penjualanTbs->panen_id !!}</td>
            <td>{!! $penjualanTbs->spb_id !!}</td>
            <td>{!! $penjualanTbs->tgl_penjualan !!}</td>
            <td>{!! $penjualanTbs->pot_susut !!}</td>
            <td>{!! $penjualanTbs->pot_sortasi !!}</td>
            <td>{!! $penjualanTbs->harga_tbs !!}</td>
            <td>{!! $penjualanTbs->keterangan !!}</td>
            <td>{!! $penjualanTbs->file_upload !!}</td>
            <td>
                {!! Form::open(['route' => ['penjualanTbs.destroy', $penjualanTbs->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('penjualanTbs.show', [$penjualanTbs->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('penjualanTbs.edit', [$penjualanTbs->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
