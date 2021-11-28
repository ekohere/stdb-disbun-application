<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>No. Surat Politani</th>
        <th>No. Surat External</th>
        <th>nama Instansi External</th>
        <th>Isi</th>
        <th>Kategori</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Akhir</th>
        <th>Lama MoU</th>
        <th>Sisa</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($mous as $mou)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $mou->number_internal !!}</td>
            <td>{!! $mou->number_external !!}</td>
            <td>{!! $mou->instansi_external !!}</td>
            <td>{!! $mou->definition !!}</td>
            <td>{!! $mou->categoryMou->name !!}</td>
            <td>{!! $mou->date_start->format('d F Y') !!}</td>
            <td>{!! isset($mou->date_end)?$mou->date_end->format('d F Y'):"Tanpa Batasan" !!}</td>
            <th>{!! isset($mou->date_end)?$mou->lama_mou:"&#8734;" !!}</th>
            <th>{!! isset($mou->date_end)?$mou->sisa_waktu:"&#8734;" !!}</th>
            <td>
                {!! Form::open(['route' => ['mous.destroy', $mou->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('mous.show', [$mou->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('mous.edit', [$mou->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
