<!-- Sudah di modifikasi untuk Edit,Lihat,Hapus -->
<table class="table table-hover table-bordered table-striped default table-responsive">
    <colgroup>
        <col class="col-xs-1">
        <col class="col-xs-7">
    </colgroup>
    <thead>
    <tr>
        <th><code>#</code></th>
        <th>Key</th>
        <th>Value</th>
        <th style="text-align: center">Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $no++ !!}</td>
            <td>{!! $profile->key !!}</td>
            <td>
                @if(substr($profile->value,0,7) == 'storage')
                    <img class="img-fluid width-200" src="{{ asset($profile->value) }}" alt="">
                @else
                    {{ $profile->value }}
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{!! route('profiles.show', [$profile->id]) !!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <a href="{!! url('editProfiles', [$profile->id]) !!}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                       {{--{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
