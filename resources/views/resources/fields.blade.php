<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::textarea('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Package Id Field -->
<div class="form-group">
    {!! Form::label('package_id', 'Package Id:') !!}
    <div class="position-relative">
        {!! Form::text('package_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <div class="position-relative">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Format Field -->
<div class="form-group">
    {!! Form::label('format', 'Format:') !!}
    <div class="position-relative">
        {!! Form::text('format', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Year Field -->
<div class="form-group">
    {!! Form::label('year', 'Year:') !!}
    <div class="position-relative">
        {!! Form::text('year', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('resources.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

