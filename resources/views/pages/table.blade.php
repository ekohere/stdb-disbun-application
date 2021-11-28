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
        <th>Kategori Page </th>
        <th>Custom URL</th>
        <th>Link</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th>Order</th>
        <th>Change Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pages as $page)
        <tr @if($page->trashed()) class="table-danger" @endif>
            <td>{!! $no++ !!}</td>
            <td>{!! $page->title !!}</td>
            <td>{!! $page->pageCategory->name !!}</td>
            <td><a target="_blank" href="{!! $page->custom_url !!}">{!! $page->custom_url !!}</a> </td>
            <td><a target="_blank" href="{!! route('detail-page',$page->slug) !!}">{!! route('detail-page',$page->slug) !!}</a> </td>
            <td>{!! $page->usersCreated->name !!}</td>
            <td>{!! $page->usersUpdated->name !!}</td>
            <td>{!! $page->order !!}</td>
            <td>
                <div class="btn-group">
                    {!! Form::open(['route' => ['pagesIncrease', $page->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-up"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['pagesDecrease', $page->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-down"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </td>
            <td>
                {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
                @if(!$page->trashed())
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pages.show', [$page->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    @can('pages.update')
                    <a href="{!! route('pages.edit', [$page->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    @endcan
                    @can('pages.destroy')
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endcan
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
