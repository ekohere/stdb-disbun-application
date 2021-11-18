<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped default">
        <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-7">
        </colgroup>
        <thead>
        <tr>
            <th><code>#</code></th>
            <th>Nama/Username</th>
            <th>Akses</th>
            <th>Kontak</th>
            <th>Pen. Jawab</th>
            <th>Unit Tipe</th>
            <th style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach($myUser as $items)
            <tr>
                <td>{!! $no++ !!}</td>
                <td>
                    <span class="text-bold-800 black">{!! $items['users']->name !!}</span><br>
                    {!! $items['users']->username !!}
                </td>
                <td>
                    @foreach($items['users']->roles as $item)
                        <span class="badge badge-primary" style="margin: 2px" title="{{ $item->desc }}">{!! $item->name !!}</span>
                    @endforeach
                </td>
                <td>
                    {!! $items['users']->no_hp !!}<br>
                    {!! $items['users']->email !!}
                </td>
                <td class="font-small-3">
                    <span class="black text-bold-600">>> Pengampu</span><br>
                    @if(!empty($items['instansi']))
                        <a href="#" class="pink">{!! $items['instansi']->nama !!}</a>
                    @else
                        <a href="#" class="pink">
                            {{ $items['unit']['nama'] }}
                        </a>
                    @endif
                </td>
                <td>
                    <span class="badge badge-danger text-uppercase" title="Unit Tipe">{!! $items['unitType']['name'] !!}</span>
                </td>
                <td>
                    @include('users.modal.detail_user')
                    {!! Form::open(['route' => ['users.destroy', $items['users']->id], 'method' => 'delete']) !!}
                    <div class="btn-group" role="group" aria-label="Basic example">
    {{--                    <a href="{!! route('users.show', [$items->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>--}}
                        <a data-target="#detailUser{{ $items->id }}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$items['users']->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
