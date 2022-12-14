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
        <th>Kategori Agenda Parent</th>
        <th>Keterangan</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($agendaCategories as $agendaCategory)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $agendaCategory->name !!}</td>
            <td>
                {!! $agendaCategory->parent->name??""  !!}
            </td>
            <td>{!! $agendaCategory->definition !!}</td>
            <td>
                {!! Form::open(['route' => ['agendaCategories.destroy', $agendaCategory->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('agendaCategories.show', [$agendaCategory->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('agendaCategories.edit', [$agendaCategory->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
