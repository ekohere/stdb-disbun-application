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
        <th>Parent</th>
        <th>Slug</th>
        <th>Order</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($categoryLembagas as $categoryLembaga)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $categoryLembaga->name !!}</td>
            <td>{!! $categoryLembaga->name_english !!}</td>
            <td>{!! $categoryLembaga->definition !!}</td>
            <td>{!! isset($categoryLembaga->parent)?$categoryLembaga->parent->name:"" !!}</td>
            <td>{!! $categoryLembaga->slug !!}</td>
            <td>{!! $categoryLembaga->order !!}</td>
            <td>
                {!! Form::open(['route' => ['categoryLembagas.destroy', $categoryLembaga->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('categoryLembagas.show', [$categoryLembaga->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('categoryLembagas.edit', [$categoryLembaga->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
