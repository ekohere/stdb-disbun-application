<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Guard Name Field -->
<div class="form-group">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <div class="position-relative">
        {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Key Field -->
<div class="form-group">
    {!! Form::label('key', 'Key:') !!}
    <div class="position-relative">
        {!! Form::text('key', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Table Name Field -->
<div class="form-group">
    {!! Form::label('table_name', 'Table Name:') !!}
    <div class="position-relative">
        {!! Form::text('table_name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('permissions.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

