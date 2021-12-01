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
        <th>Periode</th>
        <th>Jml Kas</th>
        <th>Piutang Tahun</th>
        <th>Jml Piutang Tahun</th>
        <th>Simpanan Pokok</th>
        <th>Simpanan Wajib</th>
        <th>Laba</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($neracaSimpanPinjams as $neracaSimpanPinjam)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $neracaSimpanPinjam->kode_koperasi !!}</td>
            <td>{!! $neracaSimpanPinjam->koperasi_id !!}</td>
            <td>{!! $neracaSimpanPinjam->periode !!}</td>
            <td>{!! $neracaSimpanPinjam->jml_kas !!}</td>
            <td>{!! $neracaSimpanPinjam->piutang_tahun !!}</td>
            <td>{!! $neracaSimpanPinjam->jml_piutang_tahun !!}</td>
            <td>{!! $neracaSimpanPinjam->simpanan_pokok !!}</td>
            <td>{!! $neracaSimpanPinjam->simpanan_wajib !!}</td>
            <td>{!! $neracaSimpanPinjam->laba !!}</td>
            <td>
                {!! Form::open(['route' => ['neracaSimpanPinjams.destroy', $neracaSimpanPinjam->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('neracaSimpanPinjams.show', [$neracaSimpanPinjam->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('neracaSimpanPinjams.edit', [$neracaSimpanPinjam->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
