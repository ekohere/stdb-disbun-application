<!-- Title Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Judul:') !!}
        <div class="position-relative">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Post Category Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('post_category_id', 'Kategori Post :') !!}
        <div class="position-relative">
            {!! Form::select('post_category_id',$postCategories, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('foto', 'Foto :') !!}
    <div class="position-relative">
        @if(!isset($post))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$post"  name="media" rules="mimes:png,jpeg,pdf"/>
        @endif
    </div>
</div>


<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <div class="position-relative">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('posts.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>


@section('scripts')

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'content');
        },300);
    </script>


@endsection

