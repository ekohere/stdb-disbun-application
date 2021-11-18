<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <div class="position-relative">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <div class="position-relative has-icon-left">
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        <div class="form-control-position">
            <i class="icon-mail5"></i>
        </div>
    </div>
</div>

<!-- Information Field -->
<div class="form-group">
    {!! Form::label('information', 'Information:') !!}
    <div class="position-relative">
        {!! Form::textarea('information', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('wilayahs.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

