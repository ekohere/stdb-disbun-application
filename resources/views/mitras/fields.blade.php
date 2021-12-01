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


<!-- Nomor Mitra Field -->
<div class="form-group">
    {!! Form::label('nomor_mitra', 'Nomor Mitra:') !!}
    <div class="position-relative">
        {!! Form::text('nomor_mitra', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Nama Mitra Field -->
<div class="form-group">
    {!! Form::label('nama_mitra', 'Nama Mitra:') !!}
    <div class="position-relative">
        {!! Form::text('nama_mitra', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <div class="position-relative">
        {!! Form::text('jenis', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <div class="position-relative">
        {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Kontak Field -->
<div class="form-group">
    {!! Form::label('kontak', 'Kontak:') !!}
    <div class="position-relative">
        {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
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

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <div class="position-relative">
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sudah di modifikasi -->
<!-- Submit Field -->
<div class="form-actions center">
    <a href="{!! route('mitras.index') !!}" class="btn btn-danger"> <i class="fa fa-close"></i> Batal</a>
    {!! Form::submit('Simpan', ['class' => 'btn btn-green mr-1']) !!}
</div>

