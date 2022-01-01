<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Stdb Register Id</th>
        <th>Stdb Persil Id</th>
        <th>Persil Id</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($sTDBDetailRegisters as $sTDBDetailRegister)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $sTDBDetailRegister->stdb_register_id !!}</td>
            <td>{!! $sTDBDetailRegister->stdb_persil_id !!}</td>
            <td>{!! $sTDBDetailRegister->persil_id !!}</td>
            <td>
                {!! Form::open(['route' => ['sTDBDetailRegisters.destroy', $sTDBDetailRegister->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('sTDBDetailRegisters.show', [$sTDBDetailRegister->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                       <a href="{!! route('sTDBDetailRegisters.edit', [$sTDBDetailRegister->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
