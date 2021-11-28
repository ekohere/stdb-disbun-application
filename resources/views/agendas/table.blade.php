<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Judul</th>
        <th>Content</th>
        <!-- <th>Slug</th> -->
        <th>Kategori Agenda</th>
        <th>Tanggal Acara</th>
        <th>Waktu Acara</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($agendas as $agenda)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $agenda->title !!}</td>
            <td>{!! $agenda->content !!}</td>
            <td>{!! $agenda->agendaCategory->name !!}</td>
            <td>{!! date('Y-m-d',strtotime($agenda->schedule_date)) !!}</td>
            <td>{!! $agenda->schedule_time !!}</td>
            <td>{!! $agenda->usersCreated->name !!}</td>
            <td>{!! $agenda->usersUpdated->name !!}</td>
            <td>
                {!! Form::open(['route' => ['agendas.destroy', $agenda->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('agendas.show', [$agenda->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('agendas.edit', [$agenda->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
