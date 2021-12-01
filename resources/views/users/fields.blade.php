<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <div class="position-relative">
        {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
    </div>
</div>


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

<!-- Avatar Field -->
<div class="form-group">
    {!! Form::label('avatar', 'Avatar:') !!}
    <div class="position-relative">
        {!! Form::text('avatar', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <div class="position-relative">
        {!! Form::date('email_verified_at', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <div class="position-relative has-icon-left">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <div class="form-control-position">
            <i class="icon-lock3"></i>
        </div>
    </div>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <div class="position-relative">
        {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Settings Field -->
<div class="form-group">
    {!! Form::label('settings', 'Settings:') !!}
    <div class="position-relative">
        {!! Form::textarea('settings', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kode Koperasi Field -->
<div class="form-group">
    {!! Form::label('kode_koperasi', 'Kode Koperasi:') !!}
    <div class="position-relative">
        {!! Form::text('kode_koperasi', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Koperasi Id Field -->
<div class="form-group">
    {!! Form::label('koperasi_id', 'Koperasi Id:') !!}
    <div class="position-relative">
        {!! Form::number('koperasi_id', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('users.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

