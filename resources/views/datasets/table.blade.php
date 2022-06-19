<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Name</th>
        <th>Dataset ID</th>
        <th>Owner ORG ID</th>
        <th>ORG Name</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($datasets as $dataset)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $dataset->name !!}</td>
            <td>{!! $dataset->id !!}</td>
            <td>{!! $dataset->owner_org_id !!}</td>
            <td>{!! $dataset->org_name !!}</td>
            <td>
                {!! Form::open(['route' => ['datasets.destroy', $dataset->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
{{--                    <a href="{!! route('datasets.show', [$dataset->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
{{--                    <a href="{!! route('datasets.edit', [$dataset->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>--}}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
