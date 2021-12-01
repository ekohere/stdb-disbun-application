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
        <th>Kode Anggota</th>
        <th>Anggota Id</th>
        <th>Tanggal</th>
        <th>No Nota</th>
        <th>Pembiayaan</th>
        <th>Ket</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($penjualanSaprodis as $penjualanSaprodi)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $penjualanSaprodi->kode_koperasi !!}</td>
            <td>{!! $penjualanSaprodi->koperasi_id !!}</td>
            <td>{!! $penjualanSaprodi->kode_anggota !!}</td>
            <td>{!! $penjualanSaprodi->anggota_id !!}</td>
            <td>{!! $penjualanSaprodi->tanggal !!}</td>
            <td>{!! $penjualanSaprodi->no_nota !!}</td>
            <td>{!! $penjualanSaprodi->pembiayaan !!}</td>
            <td>{!! $penjualanSaprodi->ket !!}</td>
            <td>
                {!! Form::open(['route' => ['penjualanSaprodis.destroy', $penjualanSaprodi->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('penjualanSaprodis.show', [$penjualanSaprodi->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('penjualanSaprodis.edit', [$penjualanSaprodi->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
