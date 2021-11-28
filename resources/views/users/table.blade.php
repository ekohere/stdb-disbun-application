<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped default table-responsive">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-7">
        </colgroup>
        <thead>
        <tr>
            <th><code>#</code></th>
            <th>Nama/Email</th>
            <th>Nama Display</th>
            <th>Akses</th>
            <th style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($users as $item)
            <tr>
                <td>{!! $no++ !!}</td>
                <td>
                    <span class="text-bold-800 black">{!! $item->name !!}</span><br>
                    {!! $item->email !!}
                </td>
                <td>{!! $item->display_name !!}</td>

                <td>
                    @foreach($item->roles as $role)
                        <span class="badge badge-primary" style="margin: 2px" title="{{ $role->desc }}">{!! $role->name !!}</span>
                    @endforeach
                </td>
                <td>

                    {!! Form::open(['route' => ['users.destroy', $item->id], 'method' => 'delete']) !!}
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a data-target="#detailUser{{ $item->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$item->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}

                    @include('users.modal.detail_user')
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
