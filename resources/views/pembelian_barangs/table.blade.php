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
        <th>Jenis Barang Id</th>
        <th>Tgl Order</th>
        <th>Nomor Order</th>
        <th>Nomor Invoice</th>
        <th>Mata Uang</th>
        <th>File Invoice</th>
        <th>Pemasok</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pembelianBarangs as $pembelianBarang)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pembelianBarang->kode_koperasi !!}</td>
            <td>{!! $pembelianBarang->koperasi_id !!}</td>
            <td>{!! $pembelianBarang->jenis_barang_id !!}</td>
            <td>{!! $pembelianBarang->tgl_order !!}</td>
            <td>{!! $pembelianBarang->nomor_order !!}</td>
            <td>{!! $pembelianBarang->nomor_invoice !!}</td>
            <td>{!! $pembelianBarang->mata_uang !!}</td>
            <td>{!! $pembelianBarang->file_invoice !!}</td>
            <td>{!! $pembelianBarang->pemasok !!}</td>
            <td>
                {!! Form::open(['route' => ['pembelianBarangs.destroy', $pembelianBarang->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pembelianBarangs.show', [$pembelianBarang->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pembelianBarangs.edit', [$pembelianBarang->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
