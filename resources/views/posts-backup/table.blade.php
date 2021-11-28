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
        <th>Kategori Post</th>
        <th>Link</th>
{{--        <th>Content</th>--}}
        <th>Created By</th>
        <th>Updated By</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($posts as $post)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $post->title !!}</td>
            <td>{!! $post->postCategory->name !!}</td>
            <td><a target="_blank" href="{!! route('detail-post',$post->slug) !!}">{!! route('detail-post',$post->slug) !!}</a> </td>
{{--            <td>{!! $post->content !!}</td>--}}
            <td>{!! $post->usersCreated->name !!}</td>
            <td>{!! $post->usersUpdated->name !!}</td>
            <td>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('posts.show', [$post->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('posts.edit', [$post->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
