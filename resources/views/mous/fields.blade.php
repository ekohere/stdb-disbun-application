<div class="form-group">
    {!! Form::label('file', 'Upload File MOU (PDF):') !!}
    <div class="position-relative">
        @if(!isset($mou))
            <x-media-library-attachment name="media" rules="mimes:pdf"/>
        @else
            <x-media-library-collection max-items="1" :model="$mou"  name="media" rules="mimes:pdf"/>
        @endif
    </div>
</div>

<!-- Number Internal Field -->
<div class="form-group">
    {!! Form::label('number_internal', 'Nomor Surat Politani:') !!}
    <div class="position-relative">
        {!! Form::text('number_internal', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Number External Field -->
<div class="form-group">
    {!! Form::label('number_external', 'Nomor Surat External:') !!}
    <div class="position-relative">
        {!! Form::text('number_external', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Instansi External Field -->
<div class="form-group">
    {!! Form::label('instansi_external', 'Nama Instansi External:') !!}
    <div class="position-relative">
        {!! Form::text('instansi_external', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Date Start Field -->
<div class="form-group">
    {!! Form::label('date_start', 'Tanggal Perjanjian:') !!}
    <div class="position-relative">
        {!! Form::date('date_start', isset($mou)?$mou->date_start->format('Y-m-d'):\Carbon\Carbon::today(), ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Date End Field -->
<div class="form-group">
    {!! Form::label('date_end', 'Tanggal Berakhir (Kosongkan Jika Tanpa Batasan):') !!}
    <div class="position-relative">
        {!! Form::date('date_end', isset($mou)?isset($mou->date_end)?$mou->date_end->format('Y-m-d'):null:null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Category Mou Id Field -->
<div class="form-group">
    {!! Form::label('category_mou_id', 'Category Mou:') !!}
    <div class="position-relative">
        {!! Form::select('category_mou_id', $categoryMou,null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Definition Field -->
<div class="form-group">
    {!! Form::label('definition', 'Definisi / Isi MOU:') !!}
    <div class="position-relative">
        {!! Form::textarea('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('mous.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
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

    </script>
@endsection
