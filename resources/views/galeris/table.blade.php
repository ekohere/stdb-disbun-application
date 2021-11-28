<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Title</th>
        <th>Content</th>
        <th>Users Created Id</th>
        <th>Users Updated Id</th>
        <th>Slug</th>
        <th>Event Date</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($galeris as $galeri)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $galeri->title !!}</td>
            <td>{!! $galeri->content !!}</td>
            <td>{!! $galeri->users_created_id !!}</td>
            <td>{!! $galeri->users_updated_id !!}</td>
            <td>{!! $galeri->slug !!}</td>
            <td>{!! $galeri->event_date !!}</td>
            <td>
                {!! Form::open(['route' => ['galeris.destroy', $galeri->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('galeris.show', [$galeri->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('galeris.edit', [$galeri->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
