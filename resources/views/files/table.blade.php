<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Name</th>
        <th>Name English</th>
        <th>Definition</th>
        <th>Definition English</th>
        <th>File Category</th>
        <th>Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($files as $file)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $file->name !!}</td>
            <td>{!! $file->name_english !!}</td>
            <td>{!! $file->definition !!}</td>
            <td>{!! $file->definition_english !!}</td>
            <td>{!! $file->fileCategory->name !!}</td>
            <td>{!! $file->order !!}</td>
            <td>
                {!! Form::open(['route' => ['files.destroy', $file->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('files.show', [$file->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('files.edit', [$file->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
