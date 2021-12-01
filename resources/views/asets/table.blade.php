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
        <th>Nomor</th>
        <th>Nama</th>
        <th>Tahun</th>
        <th>Nilai Awal</th>
        <th>Nilai Akhir</th>
        <th>Kondisi</th>
        <th>Foto</th>
        <th>Pemakai</th>
        <th>Keterangan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asets as $aset)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $aset->koperasi_id !!}</td>
            <td>{!! $aset->kode_koperasi !!}</td>
            <td>{!! $aset->nomor !!}</td>
            <td>{!! $aset->nama !!}</td>
            <td>{!! $aset->tahun !!}</td>
            <td>{!! $aset->nilai_awal !!}</td>
            <td>{!! $aset->nilai_akhir !!}</td>
            <td>{!! $aset->kondisi !!}</td>
            <td>{!! $aset->foto !!}</td>
            <td>{!! $aset->pemakai !!}</td>
            <td>{!! $aset->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['asets.destroy', $aset->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('asets.show', [$aset->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('asets.edit', [$aset->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
