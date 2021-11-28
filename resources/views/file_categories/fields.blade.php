<!-- Name Field -->
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
        {!! Form::text('definition', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Definition English Field -->
<div class="form-group">
    {!! Form::label('definition_english', 'Definition (English):') !!}
    <div class="position-relative">
        {!! Form::text('definition_english', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Parent Field -->
{{--<div class="form-group">
    {!! Form::label('parent', 'Parent:') !!}
    <div class="position-relative">
        {!! Form::select('parent', $fileCategories,null, ['class' => 'form-control']) !!}
    </div>
</div>--}}

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('fileCategories.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

