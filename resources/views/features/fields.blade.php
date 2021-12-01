<!-- Name Feature Field -->
<div class="form-group">
    {!! Form::label('name_feature', 'Name Feature:') !!}
    <div class="position-relative">
        {!! Form::text('name_feature', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <div class="position-relative">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Images Field -->
<div class="form-group">
    {!! Form::label('images', 'Images:') !!}
    <div class="position-relative">
        {!! Form::text('images', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('features.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

