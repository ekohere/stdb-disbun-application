<div class="form-group">
    {!! Form::label('file', 'Upload File :') !!}
    <div class="position-relative">
        @if(!isset($file))
            <x-media-library-attachment name="media" />
        @else
            <x-media-library-collection max-items="1" :model="$file"  name="media"/>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Name (Indonesia):') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Name English Field -->
<div class="form-group">
    {!! Form::label('name_english', 'Name (English):') !!}
    <div class="position-relative">
        {!! Form::text('name_english', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Definition (Indonesia):') !!}
    <div class="position-relative">
        {!! Form::textarea('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Definition English Field -->
<div class="form-group">
    {!! Form::label('definition_english', 'Definition (English):') !!}
    <div class="position-relative">
        {!! Form::textarea('definition_english', null, ['class' => 'form-control']) !!}
    </div>
</div>



<!-- File Category Id Field -->
<div class="form-group">
    {!! Form::label('file_category_id', 'File Category :') !!}
    <div class="position-relative">
        {!! Form::select('file_category_id',$fileCategories, null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <div class="position-relative">
        {!! Form::number('order', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('files.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

@section('css')
    /*<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css" integrity="sha512-jO9KUHlvIF4MH/OTiio0aaueQrD38zlvFde9JoEA+AQaCNxIJoX4Kjse3sO2kqly84wc6aCtdm9BIUpYdvFYoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />*/
    <link rel="stylesheet" type="text/css" href="{{ asset('css/media-pro/styles.css')}}">

    <livewire:styles />
    <livewire:scripts />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>

    <script  type="text/javascript">
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'definition');
        },300);
        setTimeout(function(){
            CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
            CKEDITOR.replace( 'definition_english');
        },300);

    </script>
@endsection
