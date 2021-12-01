<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Kode Jenis Barang Saprodi</th>
        <th>Jenis Barang Saprodi</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($jenisBarangSaprodis as $jenisBarangSaprodi)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $jenisBarangSaprodi->kode_jenis_barang_saprodi !!}</td>
            <td>{!! $jenisBarangSaprodi->jenis_barang_saprodi !!}</td>
            <td>
                {!! Form::open(['route' => ['jenisBarangSaprodis.destroy', $jenisBarangSaprodi->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('jenisBarangSaprodis.show', [$jenisBarangSaprodi->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('jenisBarangSaprodis.edit', [$jenisBarangSaprodi->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
