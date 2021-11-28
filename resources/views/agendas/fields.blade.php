<!-- Title Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Judul:') !!}
        <div class="position-relative">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <!-- Agenda Category Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('agenda_category_id', 'Kategori Agenda:') !!}
        <div class="position-relative">
            {!! Form::select('agenda_category_id', $agendaCategories,null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <div class="position-relative">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Schedule Date Field -->
<div class="form-group">
    {!! Form::label('schedule_date', 'Tanggal Acara:') !!}
    <div class="position-relative">
        {!! Form::date('schedule_date', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Schedule Time Field -->
<div class="form-group">
    {!! Form::label('schedule_time', 'Waktu Acara:') !!}
    <div class="position-relative">
        {!! Form::time('schedule_time', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('agendas.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
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

