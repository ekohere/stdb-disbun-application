{!! Form::open(['route' => ['posts.destroy', $id], 'method' => 'delete']) !!}
{{--<div class='btn-group'>--}}
{{--    <a href="{{ route('posts.show', $id) }}" class='btn btn-success btn-sm'>--}}
{{--        <i class="fa fa-eye"></i>--}}
{{--    </a>--}}
{{--    <a href="{{ route('posts.edit', $id) }}" class='btn btn-warning btn-sm'>--}}
{{--        <i class="fa fa-edit"></i>--}}
{{--    </a>--}}
{{--    {!! Form::button('<i class="fa fa-trash"></i>', [--}}
{{--        'type' => 'submit',--}}
{{--        'class' => 'btn btn-danger btn-sm',--}}
{{--        'onclick' => "return confirm('Are you sure?')"--}}
{{--    ]) !!}--}}
{{--</div>--}}


<div class="btn-group mr-1 mb-1">
    <button type="button" class="btn btn-icon btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i></button>
    <div class="dropdown-menu">
        <a href="{{ route('posts.show', $id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Show
        </a>
        <a href="{{ route('posts.edit', $id) }}" class='dropdown-item'>
            <i class="fa fa-edit"></i> Perubahan
        </a>
        {!! Form::button('<i class="fa fa-trash"></i> Hapus', [
            'type' => 'submit',
            'class' => 'dropdown-item',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}
