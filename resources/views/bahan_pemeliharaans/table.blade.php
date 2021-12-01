<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Kategori Bahan Pemeliharaan Id</th>
        <th>Koperasi Id</th>
        <th>Kode Koperasi</th>
        <th>Nama Bahan</th>
        <th>Satuan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($bahanPemeliharaans as $bahanPemeliharaan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $bahanPemeliharaan->kategori_bahan_pemeliharaan_id !!}</td>
            <td>{!! $bahanPemeliharaan->koperasi_id !!}</td>
            <td>{!! $bahanPemeliharaan->kode_koperasi !!}</td>
            <td>{!! $bahanPemeliharaan->nama_bahan !!}</td>
            <td>{!! $bahanPemeliharaan->satuan !!}</td>
            <td>
                {!! Form::open(['route' => ['bahanPemeliharaans.destroy', $bahanPemeliharaan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('bahanPemeliharaans.show', [$bahanPemeliharaan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('bahanPemeliharaans.edit', [$bahanPemeliharaan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
