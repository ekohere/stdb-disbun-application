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
        <th>Kategori Post Parent</th>
        <th>Keterangan</th>
        <th>Order</th>
        <th>Change Order</th>
        <!-- <th>Slug</th> -->
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($postCategories as $postCategory)
        <tr @if($postCategory->trashed()) class="table-danger" @endif>
            <td>{!! $no++ !!}</td>
            <td>{!! $postCategory->name !!}</td>
            <td>{!! $postCategory->parent->name??"" !!}</td>
            <td>{!! $postCategory->definition !!}</td>
            <td>{!! $postCategory->order !!}</td>
            <td>
                <div class="btn-group">
                    {!! Form::open(['route' => ['postCategoriesIncrease', $postCategory->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-up"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['postCategoriesDecrease', $postCategory->id]]) !!}
                    {!! Form::button('<i class="fa fa-arrow-down"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </td>
            {{--<td>{!! $postCategory->slug !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['postCategories.destroy', $postCategory->id], 'method' => 'delete']) !!}
                @if(!$postCategory->trashed())
                <div class="btn-group " role="group" aria-label="Basic example">
                    <a href="{!! route('postCategories.show', [$postCategory->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('postCategories.edit', [$postCategory->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                @else
                    {!! Form::button('<i class="fa fa-undo"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info', 'onclick' => "return confirm('Mengembalikan data yang terhapus?')"]) !!}
                @endif
                {!! Form::close() !!}
            </td>
        </tr>

        @foreach($postCategory->childsWithTrashed as $postCategoryChild)
            <tr @if($postCategoryChild->trashed() or $postCategory->trashed()) class="table-danger" @endif>
                <td>{!! $no++ !!}</td>
                <td>{!! $postCategoryChild->name !!}</td>
                <td>{!! $postCategoryChild->parentWithTrashed->name??"" !!}</td>
                <td>{!! $postCategoryChild->definition !!}</td>
                <td>{!! $postCategoryChild->order !!}</td>
                <td>
                    <div class="btn-group">
                        {!! Form::open(['route' => ['postCategoriesIncrease', $postCategoryChild->id]]) !!}
                        {!! Form::button('<i class="fa fa-arrow-up"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info']) !!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['postCategoriesDecrease', $postCategoryChild->id]]) !!}
                        {!! Form::button('<i class="fa fa-arrow-down"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
                {{--<td>{!! $postCategory->slug !!}</td>--}}
                <td>
                    {!! Form::open(['route' => ['postCategories.destroy', $postCategoryChild->id], 'method' => 'delete']) !!}
                    @if(!$postCategoryChild->trashed())
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{!! route('postCategories.show', [$postCategoryChild->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('postCategories.edit', [$postCategoryChild->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>

                    @else
                        {!! Form::button('<i class="fa fa-undo"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-info', 'onclick' => "return confirm('Mengembalikan data yang terhapus?')"]) !!}
                    @endif

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    @endforeach
    </tbody>
</table>
