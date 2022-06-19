<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Title Dataset:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Deskripsi:') !!}
    <div class="position-relative">
        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('datasets.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

