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
        <th>Jenis Barang Saprodi Id</th>
        <th>Kode Jenis Barang Saprodi</th>
        <th>Nama Saprodi</th>
        <th>Satuan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($barangSaprodis as $barangSaprodi)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $barangSaprodi->koperasi_id !!}</td>
            <td>{!! $barangSaprodi->kode_koperasi !!}</td>
            <td>{!! $barangSaprodi->jenis_barang_saprodi_id !!}</td>
            <td>{!! $barangSaprodi->kode_jenis_barang_saprodi !!}</td>
            <td>{!! $barangSaprodi->nama_saprodi !!}</td>
            <td>{!! $barangSaprodi->satuan !!}</td>
            <td>
                {!! Form::open(['route' => ['barangSaprodis.destroy', $barangSaprodi->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('barangSaprodis.show', [$barangSaprodi->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('barangSaprodis.edit', [$barangSaprodi->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
