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
        <th>Information</th>
        <th>Slug</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($fileDownloads as $fileDownload)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $fileDownload->name !!}</td>
            <td>{!! $fileDownload->information !!}</td>
            <td>{!! $fileDownload->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['fileDownloads.destroy', $fileDownload->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('fileDownloads.show', [$fileDownload->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('fileDownloads.edit', [$fileDownload->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
