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
        <th>Parent</th>
        <th>Sebagai Parent Menu</th>
        <th>Sebagai Konten Beranda</th>
        <th>Caption</th>
        <th>Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($lembagas as $lembaga)
        <tr @if($lembaga->trashed()) class="table-danger" @endif >
            <td>{!! $loop->iteration !!}</td>
            <td>{!! $lembaga->name !!}</td>
            <td>{!! $lembaga->name_english !!}</td>
            <td>{!! isset($lembaga['parent'])?$lembaga['parent']['name']:"" !!}</td>

            @if(!isset($lembaga->parent))
            <td>{!! $lembaga->show_in_parent_menu?"<i class=\"fa fa-check fa-2x text-success\">":"<i class=\"fa fa-times fa-2x text-danger\">" !!}</td>
            <td>{!! $lembaga->show_in_content?"<i class=\"fa fa-check fa-2x text-success\">":"<i class=\"fa fa-times fa-2x text-danger\">" !!}</td>
            @else
            <td></td>
            <td></td>
            @endif

            <td>{!! $lembaga->caption !!}</td>
            <td>{!! $lembaga->order !!}</td>
            <td>
                {!! Form::open(['route' => ['lembaga.destroy', $lembaga->id], 'method' => 'delete']) !!}
                @if(!$lembaga->trashed())
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('lembaga.show', [$lembaga->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('lembaga.edit', [$lembaga->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                @else
                    {!! Form::button('<i class="fa fa-undo"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info', 'onclick' => "return confirm('Mengembalikan data yang terhapus?')"]) !!}
                @endif
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
