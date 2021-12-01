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
        <th>Jenis Barang Id</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kode Jenis Barang</th>
        <th>Satuan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($barangs as $barang)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $barang->koperasi_id !!}</td>
            <td>{!! $barang->kode_koperasi !!}</td>
            <td>{!! $barang->jenis_barang_id !!}</td>
            <td>{!! $barang->kode_barang !!}</td>
            <td>{!! $barang->nama_barang !!}</td>
            <td>{!! $barang->kode_jenis_barang !!}</td>
            <td>{!! $barang->satuan !!}</td>
            <td>
                {!! Form::open(['route' => ['barangs.destroy', $barang->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('barangs.show', [$barang->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('barangs.edit', [$barang->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
