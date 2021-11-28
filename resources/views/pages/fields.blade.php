<!-- Title Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Judul (Bahasa Indonesia):') !!}
        <div class="position-relative">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('title_english', 'Judul (Bahasa Inggris):') !!}
        <div class="position-relative">
            {!! Form::text('title_english', null, ['class' => 'form-control']) !!}
        </div>
    </div>


    <!-- Page Category Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('page_category_id', 'Kategori Page:') !!}
        <div class="position-relative">
            {!! Form::select('page_category_id',$pageCategories, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('foto', 'Foto :') !!}
    <div class="position-relative">
        @if(!isset($page))
            <x-media-library-attachment  multiple name="media" rules="mimes:png,jpg,jpeg,pdf"/>
        @else
            <x-media-library-collection :model="$page"  name="media" rules="mimes:png,jpg,jpeg,pdf"/>
        @endif
    </div>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content (Bahasa Indonesia):') !!}
    <div class="position-relative">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content_english', 'Content (Bahasa Inggris):') !!}
    <div class="position-relative">
        {!! Form::textarea('content_english', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('custom_url', 'Custom URL (Kosongkan jika tidak diperlukan):') !!}
    <div class="position-relative">
        {!! Form::text('custom_url', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('order', 'Order :') !!}
    <div class="position-relative">
        {!! Form::number('order', isset($page)?$page->order:0, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('pages.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

@section('scripts')

    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'content');

            CKEDITOR.replace( 'content_english');
        },300);
    </script>


@endsection

