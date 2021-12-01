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
        <th>Kode Persil</th>
        <th>Persil Id</th>
        <th>Kategori Pemeliharaan Id</th>
        <th>Luas Lahan</th>
        <th>Tgl Pelaksanaan</th>
        <th>Jml Luas Dikerjakan</th>
        <th>Rotasi</th>
        <th>Hk</th>
        <th>Nilai Pekerja</th>
        <th>Jml Transport</th>
        <th>Cara Aplikasi</th>
        <th>Mengunakan Apd</th>
        <th>Ket</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pemeliharaans as $pemeliharaan)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $pemeliharaan->kode_koperasi !!}</td>
            <td>{!! $pemeliharaan->koperasi_id !!}</td>
            <td>{!! $pemeliharaan->kode_persil !!}</td>
            <td>{!! $pemeliharaan->persil_id !!}</td>
            <td>{!! $pemeliharaan->kategori_pemeliharaan_id !!}</td>
            <td>{!! $pemeliharaan->luas_lahan !!}</td>
            <td>{!! $pemeliharaan->tgl_pelaksanaan !!}</td>
            <td>{!! $pemeliharaan->jml_luas_dikerjakan !!}</td>
            <td>{!! $pemeliharaan->rotasi !!}</td>
            <td>{!! $pemeliharaan->hk !!}</td>
            <td>{!! $pemeliharaan->nilai_pekerja !!}</td>
            <td>{!! $pemeliharaan->jml_transport !!}</td>
            <td>{!! $pemeliharaan->cara_aplikasi !!}</td>
            <td>{!! $pemeliharaan->mengunakan_apd !!}</td>
            <td>{!! $pemeliharaan->ket !!}</td>
            <td>
                {!! Form::open(['route' => ['pemeliharaans.destroy', $pemeliharaan->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pemeliharaans.show', [$pemeliharaan->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pemeliharaans.edit', [$pemeliharaan->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
