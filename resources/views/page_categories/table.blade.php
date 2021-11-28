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
        <th>Nama (English)</th>
        <th>Kategori Page Parent</th>
        <th>URL</th>
        <th>Keterangan</th>
        <th>Order</th>
        <th>Change Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($pageCategories as $pageCategory)
        <tr @if($pageCategory->trashed()) class="table-danger" @endif>
            <td>{!! $no++ !!}</td>
            <td>{!! $pageCategory->name !!}</td>
            <td>{!! $pageCategory->name_english !!}</td>
            <td>{!! $pageCategory->parent->name??"" !!}</td>
            <td>{!! $pageCategory->url !!}</td>
            <td>{!! $pageCategory->definition !!}</td>
            <td>{!! $pageCategory->order !!}</td>
            <td>
                <div class="btn-group">
                    {!! Form::open(['route' => ['pageCategoriesIncrease', $pageCategory->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-up"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['pageCategoriesDecrease', $pageCategory->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-down"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </td>
            <td>
                {!! Form::open(['route' => ['pageCategories.destroy', $pageCategory->id], 'method' => 'delete']) !!}
                @if(!$pageCategory->trashed())
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('pageCategories.show', [$pageCategory->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('pageCategories.edit', [$pageCategory->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
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
