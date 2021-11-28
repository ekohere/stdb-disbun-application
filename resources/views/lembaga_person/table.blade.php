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
        <th>Jabatan</th>
        <th>Order</th>
<!--        <th>Order Pada Header</th>-->
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($lembagaPerson as $item)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $item->person->name !!}</td>
            <td>{!! $item->jabatan->name !!}</td>
            <td>{!! $item->order !!}</td>
            {{--@if($lembaga->show_in_header)
                <td>{!! $item->order_in_header !!}</td>
            @endif--}}
            <td>
                {!! Form::open(['route' => ['lembagaPerson.destroy',$slug, $item->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                                       <a href="{!! route('lembagaPerson.edit', [$slug,$item->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
