<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Nama</th>
        <th>Nama English</th>
        <th>Keterangan</th>
        <th>Tampilkan Pada Header</th>
        <th>Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($jabatans as $item)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $item->name !!}</td>
            <td>{!! $item->name_english !!}</td>
            <td>{!! $item->definition !!}</td>
            <td>{!! $item->show_in_header?"<i class=\"fa fa-check fa-2x text-success\">":"<i class=\"fa fa-times fa-2x text-danger\">" !!}</td>
            <td>{!! $item->order !!}</td>
            <td>
                {!! Form::open(['route' => ['jabatan.destroy', $item->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('jabatan.show', [$item->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('jabatan.edit', [$item->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
