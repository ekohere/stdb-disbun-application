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
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($fileCategories as $fileCategory)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $fileCategory->name !!}</td>
            <td>{!! $fileCategory->name_english !!}</td>
            <td>{!! $fileCategory->definition !!}</td>
            <td>{!! $fileCategory->definition_english !!}</td>
            <td>
                {!! Form::open(['route' => ['fileCategories.destroy', $fileCategory->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('fileCategories.show', [$fileCategory->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('fileCategories.edit', [$fileCategory->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
